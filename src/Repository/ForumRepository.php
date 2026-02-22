<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/02/2026, 13:16
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumRepository.php
 * @date    21/01/2026
 * @time    23:19
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Repository;

use App\Entity\Forum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;
use Override;

/**
 * @extends ServiceEntityRepository<Forum>
 */
final class ForumRepository extends NestedTreeRepository
{

    #[Override]
    public function getNodesHierarchyQueryBuilder(
        $node = null,
        $direct = false,
        array $options = [],
        $includeNode = false
    ) {
        $qb = parent::getNodesHierarchyQueryBuilder($node, $direct, $options, $includeNode);

        $qb
            ->addSelect('m.createdAt AS lastMessageAt')
            ->leftJoin('node.lastThread', 'lt')
            ->leftJoin('lt.lastMessage', 'm')
        ;

        return $qb;
    }

    #[Override]
    public function getNodesHierarchy($node = null, $direct = false, array $options = [], $includeNode = false)
    {
        $results = parent::getNodesHierarchy($node, $direct, $options, $includeNode);

        // Aplanamos el resultado si Doctrine lo ha devuelto en formato mixto debido al addSelect
        return array_map(function (array $item) {
            if (isset($item[0]) && is_array($item[0])) {
                return array_merge($item[0], array_diff_key($item, [0 => true]));
            }

            return $item;
        }, $results);
    }
}
