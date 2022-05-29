<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220529165715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Alters columns data type to TEXT for tables foods, food_categooies';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE foods ALTER COLUMN name TYPE TEXT');
        $this->addSql('ALTER TABLE food_categories ALTER COLUMN name TYPE TEXT');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE foods ALTER COLUMN name TYPE VARCHAR');
        $this->addSql('ALTER TABLE food_categories ALTER COLUMN name TYPE VARCHAR');
    }
}
