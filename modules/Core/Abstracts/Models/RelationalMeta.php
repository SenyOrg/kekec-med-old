<?php namespace KekecMed\Core\Abstracts\Models;

use KekecMed\Core\Arrays\CoreArray;

/**
 * Class RelationalMeta
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Models
 */
class RelationalMeta extends CoreArray
{
    /**
     * Handles
     */
    const HANDLE_DELETE = 'delete';
    const HANDLE_UPDATE = 'update';

    /**
     * RelationalMeta constructor.
     *
     * @param array  $modelAttribute    Attribute identifier that holds the RelationObject
     * @param string $dataAttribute     Attribute identifier that will retrieved from the attributes array provided
     *                                  from the Request
     * @param string $databaseAttribute Column name in database that should get the dataAttribte
     * @param string $handle
     */
    public function __construct($modelAttribute, $dataAttribute, $databaseAttribute, $handle)
    {
        // Create the store
        $store = compact('modelAttribute', 'dataAttribute', 'databaseAttribute', 'handle');

        parent::__construct($store);
    }
}