<?php


namespace Modules\Admin\Repositories\Blog;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\BlogTable;

class BlogRepository implements BlogRepositoryInterface
{
    protected $timestamps = true;
    protected $blog;

    public function __construct(
        BlogTable $blog
    ) {
        $this->blog = $blog;
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = [])
    {
        return $this->blog->getList($filters);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $data['title_vi'] = strip_tags($data['title_vi']);
        $data['title_en'] = strip_tags($data['title_en']);
//            $data['alias_vi'] = str_slug($data['title_vi']);
//            $data['alias_en'] = str_slug($data['title_en']);
        $data['description_vi'] = strip_tags($data['description_vi']);
        $data['description_en'] = strip_tags($data['description_en']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        $data['published_date'] = date('Y-m-d H:i:s');
        $data['published_by'] = Auth::id();
        if (isset($data['image_thumb'])) {
            $data['image_thumb'] = $this->transferTempfileToAdminfile(
                $data['image_thumb'],
                str_replace('', '', $data['image_thumb'])
            );
        } else {
            unset($data['image_thumb']);
        }
        $id_blog = $this->blog->add($data);

        $result = [
            'error' => false,
            'message' => __('admin::validation.blog.success'),
            'id' => $id_blog
        ];
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->blog->getItem($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        $data['title_vi'] = strip_tags($data['title_vi']);
        $data['title_en'] = strip_tags($data['title_en']);
//            $data['alias_vi'] = str_slug($data['title_vi']);
//            $data['alias_en'] = str_slug($data['title_en']);
        $data['description_vi'] = strip_tags($data['description_vi']);
        $data['description_en'] = strip_tags($data['description_en']);
        $data['updated_by'] = Auth::id();
        $data['published_date'] = date('Y-m-d H:i:s');
        $data['published_by'] = Auth::id();
        if (isset($data['image_thumb'])) {
            $data['image_thumb'] = $this->transferTempfileToAdminfile(
                $data['image_thumb'],
                str_replace('', '', $data['image_thumb'])
            );
        } else {
            unset($data['image_thumb']);
        }

        $this->blog->edit($data, $id);


        $result = [
            'error' => false,
            'message' => __('admin::validation.blog.update_success')
        ];
        return $result;
    }

    /**
     * Move image từ folder temp sang folder blog category
     *
     * @param $filename
     * @return string
     */
    private function transferTempfileToAdminfile($filename)
    {
        $old_path = TEMP_PATH . '/' . $filename;
        $new_path = BLOG_PATH . date('Ymd') . '/' . $filename;
        Storage::disk('public')->makeDirectory(BLOG_PATH . date('Ymd'));
        Storage::disk('public')->move($old_path, $new_path);
        return $new_path;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->blog->remove($id);
    }

}