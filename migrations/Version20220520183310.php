<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520183310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'change table name from composite_foods to foods';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE composite_foods RENAME TO foods');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE foods RENAME TO composite_foods');
    }
}
