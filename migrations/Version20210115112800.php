<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210115112800 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book_author (book_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_9478D34516A2B381 (book_id), INDEX IDX_9478D345F675F31B (author_id), PRIMARY KEY(book_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D34516A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D345F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book ADD publisher_id INT NOT NULL, ADD genre_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33140C86FCE FOREIGN KEY (publisher_id) REFERENCES publisher (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3314296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A33140C86FCE ON book (publisher_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3314296D31F ON book (genre_id)');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C71868B2E');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D86650F');
        $this->addSql('DROP INDEX IDX_9474526C71868B2E ON comment');
        $this->addSql('DROP INDEX IDX_9474526C9D86650F ON comment');
        $this->addSql('ALTER TABLE comment ADD user_id INT NOT NULL, ADD book_id INT NOT NULL, DROP user_id_id, DROP book_id_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('CREATE INDEX IDX_9474526C16A2B381 ON comment (book_id)');
        $this->addSql('ALTER TABLE matching DROP FOREIGN KEY FK_DC10F289AC1E554D');
        $this->addSql('DROP INDEX IDX_DC10F289AC1E554D ON matching');
        $this->addSql('ALTER TABLE matching CHANGE user_a_id_id user_a_id INT NOT NULL');
        $this->addSql('ALTER TABLE matching ADD CONSTRAINT FK_DC10F289415F1F91 FOREIGN KEY (user_a_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DC10F289415F1F91 ON matching (user_a_id)');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784189D86650F');
        $this->addSql('DROP INDEX IDX_14B784189D86650F ON photo');
        $this->addSql('ALTER TABLE photo CHANGE user_id_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_14B78418A76ED395 ON photo (user_id)');
        $this->addSql('ALTER TABLE ranking DROP FOREIGN KEY FK_80B839D09D86650F');
        $this->addSql('DROP INDEX UNIQ_80B839D09D86650F ON ranking');
        $this->addSql('ALTER TABLE ranking CHANGE user_id_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE ranking ADD CONSTRAINT FK_80B839D0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_80B839D0A76ED395 ON ranking (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE book_author');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33140C86FCE');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3314296D31F');
        $this->addSql('DROP INDEX IDX_CBE5A33140C86FCE ON book');
        $this->addSql('DROP INDEX IDX_CBE5A3314296D31F ON book');
        $this->addSql('ALTER TABLE book DROP publisher_id, DROP genre_id');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C16A2B381');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395 ON comment');
        $this->addSql('DROP INDEX IDX_9474526C16A2B381 ON comment');
        $this->addSql('ALTER TABLE comment ADD user_id_id INT NOT NULL, ADD book_id_id INT NOT NULL, DROP user_id, DROP book_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C71868B2E FOREIGN KEY (book_id_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C71868B2E ON comment (book_id_id)');
        $this->addSql('CREATE INDEX IDX_9474526C9D86650F ON comment (user_id_id)');
        $this->addSql('ALTER TABLE matching DROP FOREIGN KEY FK_DC10F289415F1F91');
        $this->addSql('DROP INDEX IDX_DC10F289415F1F91 ON matching');
        $this->addSql('ALTER TABLE matching CHANGE user_a_id user_a_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE matching ADD CONSTRAINT FK_DC10F289AC1E554D FOREIGN KEY (user_a_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DC10F289AC1E554D ON matching (user_a_id_id)');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418A76ED395');
        $this->addSql('DROP INDEX IDX_14B78418A76ED395 ON photo');
        $this->addSql('ALTER TABLE photo CHANGE user_id user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784189D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_14B784189D86650F ON photo (user_id_id)');
        $this->addSql('ALTER TABLE ranking DROP FOREIGN KEY FK_80B839D0A76ED395');
        $this->addSql('DROP INDEX UNIQ_80B839D0A76ED395 ON ranking');
        $this->addSql('ALTER TABLE ranking CHANGE user_id user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE ranking ADD CONSTRAINT FK_80B839D09D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_80B839D09D86650F ON ranking (user_id_id)');
    }
}
