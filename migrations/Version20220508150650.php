<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508150650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'fulfils food categories';
    }

    public function up(Schema $schema): void
    {
        $categories = [
            ['name' => 'Fruits'],
            ['name' => 'Vegetables'],
            ['name' => 'Grains'],
            ['name' => 'Protein Foods'],
            ['name' => 'Dairy']
        ];
        foreach ($categories as $category) {
            $this->addSql('INSERT INTO food_categories(name) VALUES(:name)', $category);
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
