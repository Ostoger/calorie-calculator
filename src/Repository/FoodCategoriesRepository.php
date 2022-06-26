<?php

namespace App\Repository;

use App\Entity\FoodCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * @extends ServiceEntityRepository<FoodCategories>
 *
 * @method FoodCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method FoodCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method FoodCategories[]    findAll()
 * @method FoodCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FoodCategoriesRepository extends ServiceEntityRepository
{
    private const CACHE_KEY = 'categories_list';

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FoodCategories::class);
    }

    public function add(FoodCategories $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(FoodCategories $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getAllFoodCategoriesNames(CacheInterface $cache): array
    {
        return $cache->get('cache.all_food_categories', function (ItemInterface $item) {
            $categories = $this->createQueryBuilder('fcr')
                ->select('fcr.name')
                ->orderBy('fcr.id', 'ASC')
                ->getQuery()
                ->getResult();
            $foodCategoriesList = [];
            foreach ($categories as $category) {
                $foodCategoriesList[] = $category['name'];
            }

            return $foodCategoriesList;
        });
    }

//    /**
//     * @return FoodCategories[] Returns an array of FoodCategories objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FoodCategories
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
