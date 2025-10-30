<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\Eloquent\Baseinterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements Baseinterface
{
    /**
     * @var Model $model
     */

    public Model $model;

    /**
     * @return mixed
     */

    public function get(): mixed
    {
        return $this->model->get();
    }

    /**
     * @param array $a
     *
     * @return mixed
     */

    public function store(array $a): mixed
    {
        return $this->model->query()->create($a);
    }

    /**
     * @param mixed $id
     *
     * @param array $data
     *
     * @return mixed
     */

    public function Update(mixed $id, array $data): mixed
    {
        $model = $this->show($id);
        $model->update($data);
        return $model;
    }

    /**
     * @param mixed $id
     *
     * @return mixed
     */

    public function show(mixed $id): mixed
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param mixed $id
     *
     * @return mixed
     */

    public function findById(mixed $id): mixed
    {
        return $this->model->find($id);
    }

    /**
     * @param mixed $id
     *
     * @return mixed
     */

    public function destroy(mixed $id): mixed
    {
        $model = $this->show($id);
        $model->delete();
        return $model;
    }

}
?>
