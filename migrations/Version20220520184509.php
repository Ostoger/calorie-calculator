<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520184509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'adds description column to foods table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE foods ADD COLUMN description text');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE foods DROP COLUMN description');
    }
}
