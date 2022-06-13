<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Enums\FoodCategoriesEnum;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220605071208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'adds fruits to foods';
    }

    public function up(Schema $schema): void
    {
        $categoryForFruits = FoodCategoriesEnum::Fruits->value;
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 66.79, 0.72, 0.69, 15.93, 'Apple Semerenko', 'approximate weight 176g')");
        $this->addSql("INSERT INTO foods(food_category_id, energy, protein, fat, carbohydrate, name, description)".
            "VALUES ($categoryForFruits, 42, 0.8, 0.4, 10.1, 'Kiwi', 'approximate weight 69g')");

    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM foods WHERE name IN ('Apple Semerenko', 'Kiwi')");
    }
}
