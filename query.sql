SELECT `id` as `ArticleID`, `title` as `ArticleTitle`, (SELECT count(*) FROM `comments` WHERE `comments`.`article_id` = `articles`.`id`) as `NumberOfComments` FROM `articles` WHERE (SELECT count(*) FROM `comments` WHERE `comments`.`article_id` = `articles`.`id`) > 100;