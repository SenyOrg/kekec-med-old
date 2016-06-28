<?php namespace KekecMed\Core\Abstracts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Trait RelationalModel
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
trait RelationalModel
{
    /**
     * Update the model in the database.
     *
     * @param  array $attributes
     * @param  array $options
     *
     * @return bool|int
     * @throws \Exception
     */
    public function updateWithRelations(array $attributes = [], array $options = [])
    {
        // Check for Relational Interface
        if ($this instanceof Relational) {
            // Update model first
            if (parent::update($attributes, $options)) {
                $relationalMetas = $this->getRelationalMeta();

                // Handle Relational
                foreach ($relationalMetas as $relationalMeta) {

                    if ($relationalMeta instanceof RelationalMeta) {
                        $data = $attributes[$relationalMeta->get('dataAttribute')];
                        $relationObject = $this->{$relationalMeta->get('modelAttribute')}();

                        // Check for existing data and make sure
                        // that provided attribute is an relation
                        if (isset($data) && $relationObject instanceof Relation) {
                            // Relation: HasMany

                            /** @var HasMany $relationObject */
                            if ($relationObject instanceof HasMany) {
                                // Check provided handle method
                                $relationHandle = $relationalMeta->get('handle');
                                if ($relationHandle == RelationalMeta::HANDLE_DELETE) {
                                    // DELETE: Let us delete all related data
                                    $relationObject->delete();
                                } else {
                                    if ($relationHandle == RelationalMeta::HANDLE_UPDATE) {
                                        // @todo: Implement Update Routine
                                    }
                                }

                                // Retrieve local key and value
                                $parentId = $relationObject->getParentKey();

                                // Create new related Entries
                                foreach ($data as $relatedId) {
                                    // Create a new Instance of related Model
                                    $relatedClass = get_class($relationObject->getRelated());
                                    /** @var Model $model */
                                    $model = new $relatedClass();

                                    // Fill in necessary data
                                    $model->fill([
                                        $relationObject->getPlainForeignKey()     => $parentId,
                                        $relationalMeta->get('databaseAttribute') => $relatedId
                                    ]);

                                    // Save it !!!!
                                    $relationObject->save($model);
                                }
                            }
                        }
                    }
                }

                return true;
            }

            return false;
        }

        throw new \Exception('RelationModel needs Relational interface');
    }
}