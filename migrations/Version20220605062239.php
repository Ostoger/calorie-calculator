<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220605062239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'changes data type for foods attributes';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("ALTER TABLE foods ALTER COLUMN energy TYPE float(2)");
        $this->addSql("ALTER TABLE foods ALTER COLUMN protein TYPE float(2)");
        $this->addSql("ALTER TABLE foods ALTER COLUMN fat TYPE float(2)");
        $this->addSql("ALTER TABLE foods ALTER COLUMN carbohydrate TYPE float(2)");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("ALTER TABLE foods ALTER COLUMN energy TYPE integer");
        $this->addSql("ALTER TABLE foods ALTER COLUMN protein TYPE integer");
        $this->addSql("ALTER TABLE foods ALTER COLUMN fat TYPE integer");
        $this->addSql("ALTER TABLE foods ALTER COLUMN carbohydrate TYPE integer");
    }
}
