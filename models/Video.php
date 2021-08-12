<?php namespace Dimti\Video\Models;

use Dimti\Video\Classes\TwigFilters;
use Model;
use System\Models\File;

/**
 * Video Model
 */
class Video extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'dimti_video_videos';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'youtube_url' => [
            'required_without_all:youtube_short_url,youtube_embed_url,video_src_url',
            'regex:#^https://www.youtube.com/watch\?v=[a-zA-Z0-9_-]+(&.+)?$#'
        ],
        'youtube_short_url' => [
            'required_without_all:youtube_url,youtube_embed_url,video_src_url',
            'regex:#^https://youtu.be/[a-zA-Z0-9_-]+(\?list=[a-zA-Z0-9_-]+)?$#'
        ],
        'youtube_embed_url' => [
            'required_without_all:youtube_url,youtube_short_url,video_src_url',
            'regex:#^https://www.youtube.com/embed/[a-zA-Z0-9_-]+(\?list=[a-zA-Z0-9_-]+)?$#'
        ],
        'video_src_url' => 'required_without_all:youtube_url,youtube_embed_url,youtube_short_url|URL'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [
        'record' => []
    ];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'preview' => File::class,
    ];
    public $attachMany = [];

    public function beforeSave()
    {
        if (!$this->youtube_short_url && $this->youtube_url) {
            $this->youtube_short_url = TwigFilters::youtubeShortUrl($this->youtube_url);
        }

        if (!$this->youtube_embed_url && $this->youtube_short_url) {
            $this->youtube_embed_url = TwigFilters::youtubeEmbedUrl($this->youtube_short_url);
        }

        if (!$this->preview && ($this->youtube_embed_url || $this->thumbnail_url)) {
            if (!$this->thumbnail_url && $this->youtube_embed_url) {
                $this->thumbnail_url = TwigFilters::youtubeEmbedThumbnail($this->youtube_embed_url);
            }

            if ($this->thumbnail_url) {
                try {
                    $this->preview = (new File())->fromUrl($this->thumbnail_url);
                } catch (\Exception $e) {
                    \Log::error('Details object with unable to download the file', $this->attributes);

                    throw $e;
                }
            }
        }
    }

    public function beforeDelete()
    {
        if ($preview = $this->preview()->getResults()) {
            $preview->delete();
        }
    }

    public function getPreview()
    {
        return $this->preview ?? Settings::instance()->preview;
    }
}