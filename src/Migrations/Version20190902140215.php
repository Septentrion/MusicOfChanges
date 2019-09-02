<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190902140215 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE opus ADD is_part_of_id INT DEFAULT NULL, ADD type VARCHAR(64) NOT NULL');
        $this->addSql('ALTER TABLE opus ADD CONSTRAINT FK_8DB4FD2C1474703B FOREIGN KEY (is_part_of_id) REFERENCES opus (id)');
        $this->addSql('CREATE INDEX IDX_8DB4FD2C1474703B ON opus (is_part_of_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE opus DROP FOREIGN KEY FK_8DB4FD2C1474703B');
        $this->addSql('DROP INDEX IDX_8DB4FD2C1474703B ON opus');
        $this->addSql('ALTER TABLE opus DROP is_part_of_id, DROP type');
    }
}
