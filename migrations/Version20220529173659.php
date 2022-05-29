<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220529173659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'changes category name from Protein Foods to Protein foods';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("UPDATE food_categories SET name = 'Protein foods' WHERE name = 'Protein Foods'");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("UPDATE food_categories SET name = 'Protein Foods' WHERE name = 'Protein foods'");
    }
}
