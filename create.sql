DROP TABLE if exists main;
CREATE TABLE main (
  ID int not null auto_increment primary key,
  date datetime not null,
  e_id char(3) not null,
  price int not null
);

DROP TABLE if exists expenses;
CREATE TABLE expenses (
  e_id char(3) not null primary key,
  e_name varchar(255) not null,
  e_cate_id char(3) not null
);

DROP TABLE if exists expenses_category;
CREATE TABLE expenses_category (
  e_cate_id char(3) not null primary key,
  e_cate_name varchar(255) not null
);

INSERT INTO expenses (e_id, e_name, e_cate_id)
VALUES ('001', '食品', 'E01'),
 ('002', '外食', 'E01'),
 ('003', '生活品', 'E02'),
 ('004', '衣類', 'E02'),
 ('005', '小説・マンガ', 'E03'),
 ('006', '本', 'E04'),
 ('007', 'ネット学習関連', 'E04'),
 ('008', '旅費・交通費', 'E05'),
 ('009', '電気', 'E06'),
 ('010', 'ガス', 'E06'),
 ('011', '水道', 'E06'),
 ('012', 'CD・音楽', 'E03'),
 ('013', '文房具', 'E02'),
 ('014', '医療費', 'E07'),
 ('015', 'ガジェット・電子パーツ', 'E03');

INSERT INTO expenses_category (e_cate_id, e_cate_name)
VALUES ('E01', '食費'),
 ('E02', '生活費'),
 ('E03', '趣味'),
 ('E04', '技術'),
 ('E05', '旅費・交通費'),
 ('E06', '光熱費'),
 ('E07', '医療費');

-- getResults
SELECT M.date, E.e_name, M.price FROM main AS M
INNER JOIN expenses AS E
ON M.e_id = E.e_id;