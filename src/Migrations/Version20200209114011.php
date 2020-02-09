<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200209114011 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_acl (user_id INT NOT NULL, acl_id INT NOT NULL, INDEX IDX_57960C99A76ED395 (user_id), INDEX IDX_57960C9944082458 (acl_id), PRIMARY KEY(user_id, acl_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, keyword VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_acl ADD CONSTRAINT FK_57960C99A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_acl ADD CONSTRAINT FK_57960C9944082458 FOREIGN KEY (acl_id) REFERENCES acl (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_acl DROP FOREIGN KEY FK_57960C9944082458');
        $this->addSql('DROP TABLE user_acl');
        $this->addSql('DROP TABLE acl');
    }
}
