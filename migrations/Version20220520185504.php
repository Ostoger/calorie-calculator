<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520185504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'adds food categories';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO food_categories(name) VALUES ('Pastry')");
        $this->addSql("INSERT INTO food_categories(name) VALUES ('Composite foods')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM food_categories WHERE name='Pastry'");
        $this->addSql("DELETE FROM food_categories WHERE name='Composite foods'");
    }
}
