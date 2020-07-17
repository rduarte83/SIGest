CREATE TABLE contratos
(
    id          SERIAL PRIMARY KEY,
    cliente_id  BIGINT UNSIGNED NOT NULL,
    produtos BIGINT UNSIGNED NOT NULL,
    inicio      DATE            NOT NULL,
    fim         DATE            NOT NULL,
    tipo        VARCHAR(20)     NOT NULL,
    valor       INT(11)         NOT NULL DEFAULT '0',
    inc         INT(11)         NOT NULL,
    preco_p     DECIMAL(5, 4)   NOT NULL,
    preco_c     DECIMAL(5, 4)            DEFAULT '0',
    facturar    FLOAT                    DEFAULT '0',
    FOREIGN KEY (cliente_id) REFERENCES clientes (nif) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (produto) REFERENCES produtos (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE contagens
(
    id          SERIAL PRIMARY KEY,
    preto       INT,
    cor         INT,
    data        DATE NOT NULL,
    contrato_id BIGINT UNSIGNED,
    FOREIGN KEY (contrato_id) REFERENCES contrato (id) ON UPDATE CASCADE ON DELETE CASCADE
);


INSERT INTO contratos (cliente_id,produto,inicio,fim,tipo,valor,inc,preco_p,preco_c) VALUES (100000011,"vestibulum nec,","2019-08-04","2020-05-06","Trimestral",16,158,1,1),(100000001,"diam luctus","2020-04-17","2020-09-11","Anual",19,297,1,1),(100000000,"felis, adipiscing","2019-10-17","2020-05-03","Mensal",15,187,1,1),(100000003,"Vivamus molestie","2020-12-23","2020-08-31","Mensal",20,494,1,1),(100000017,"tellus. Suspendisse","2020-08-10","2019-07-13","Mensal",17,107,1,1),(100000019,"ridiculus mus.","2020-10-02","2020-06-14","Trimestral",14,179,1,1),(100000010,"eget odio.","2019-09-29","2019-07-28","Mensal",20,395,1,1),(100000000,"pede nec","2020-03-07","2020-05-21","Anual",12,274,1,1),(100000001,"congue turpis.","2020-11-12","2019-12-23","Mensal",13,372,1,1),(100000012,"vulputate, posuere","2021-06-22","2021-03-21","Anual",16,272,1,1),(100000004,"dui, in","2020-07-12","2020-10-08","Trimestral",17,217,1,1),(100000013,"Phasellus fermentum","2019-12-25","2019-11-25","Anual",11,317,1,1),(100000005,"mauris elit,","2019-11-21","2020-07-07","Mensal",14,192,1,1),(100000011,"Cras convallis","2020-08-26","2020-11-18","Anual",12,175,1,1),(100000008,"non sapien","2020-07-04","2020-07-09","Mensal",16,493,1,1),(100000007,"vitae semper","2020-01-28","2020-09-26","Mensal",12,440,1,1),(100000007,"tempor bibendum.","2020-07-15","2021-01-27","Trimestral",12,173,1,1),(100000008,"mi tempor","2020-02-02","2020-06-21","Anual",18,493,1,1),(100000002,"commodo ipsum.","2020-02-28","2020-01-09","Mensal",20,138,1,1),(100000005,"mi fringilla","2019-08-18","2020-07-01","Mensal",12,492,1,1),(100000003,"augue ut","2019-08-01","2020-08-20","Mensal",18,361,1,1),(100000010,"orci. Ut","2021-05-02","2021-01-11","Trimestral",14,373,1,1),(100000016,"at sem","2019-12-22","2020-12-20","Mensal",12,227,1,1),(100000002,"risus. Donec","2020-07-06","2021-03-19","Mensal",20,297,1,1),(100000010,"pretium et,","2020-07-12","2021-03-17","Trimestral",20,238,1,1),(100000001,"sed libero.","2021-03-27","2020-10-14","Mensal",10,318,1,1),(100000014,"malesuada fames","2019-07-22","2020-08-22","Anual",20,378,1,1),(100000006,"turpis vitae","2021-01-15","2020-07-24","Anual",17,284,1,1),(100000019,"non enim","2020-02-04","2019-08-09","Mensal",10,406,1,1),(100000018,"vestibulum. Mauris","2020-04-19","2019-12-21","Anual",18,451,1,1),(100000010,"Phasellus ornare.","2020-09-22","2020-06-17","Anual",11,464,1,1),(100000015,"congue a,","2020-04-18","2019-08-28","Mensal",16,414,1,1),(100000009,"magna nec","2020-09-24","2021-02-16","Anual",12,141,1,1),(100000003,"Mauris ut","2019-12-26","2021-05-16","Anual",15,312,1,1),(100000017,"Donec consectetuer","2019-08-06","2020-12-26","Trimestral",16,405,1,1),(100000010,"adipiscing elit.","2019-11-03","2020-05-30","Trimestral",18,414,1,1),(100000000,"et magnis","2020-09-29","2020-05-13","Mensal",13,142,1,1),(100000012,"Mauris non","2020-04-21","2020-07-22","Mensal",16,222,1,1),(100000015,"in felis.","2020-07-03","2020-02-07","Anual",16,150,1,1),(100000004,"porttitor vulputate,","2020-02-21","2021-03-06","Trimestral",15,447,1,1),(100000010,"Nullam feugiat","2020-08-13","2021-01-22","Trimestral",13,126,1,1),(100000018,"rutrum. Fusce","2020-06-25","2021-05-22","Mensal",20,306,1,1),(100000017,"bibendum sed,","2020-06-12","2020-01-25","Trimestral",10,464,1,1),(100000003,"eget, ipsum.","2021-04-06","2021-04-21","Anual",13,350,1,1),(100000016,"aliquam eu,","2021-03-06","2021-01-23","Trimestral",18,462,1,1),(100000002,"eu odio","2020-08-15","2019-08-31","Mensal",15,294,1,1),(100000004,"consequat enim","2021-06-17","2020-10-05","Trimestral",16,141,1,1),(100000005,"ut, pharetra","2020-09-16","2020-08-12","Anual",18,274,1,1),(100000002,"enim. Etiam","2021-05-03","2019-09-05","Mensal",16,235,1,1),(100000007,"consectetuer adipiscing","2019-10-07","2020-06-22","Trimestral",11,111,1,1);