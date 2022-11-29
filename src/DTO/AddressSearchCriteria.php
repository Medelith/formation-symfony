<?php

declare(strict_types=1);

namespace App\DTO;

use App\DTO\Shared\PaginationCriteria;
use App\DTO\Shared\SearchTextCriteria;
use App\DTO\Shared\SortCriteria;
use App\Entity\User;
use OpenApi\Attributes\Property;

/**
 * Contient tout les critéres de recherche pour les adresses
 */
class AddressSearchCriteria
{
    use PaginationCriteria;
    use SortCriteria;
    use SearchTextCriteria;

    /**
     * Recherche par utilisater
     */
    #[Property(type: 'number')]
    public ?User $user = null;
}
