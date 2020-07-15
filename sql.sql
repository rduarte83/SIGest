CREATE TABLE clientes
(
    nif      BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY,
    id       BIGINT(20) UNSIGNED,
    cliente  VARCHAR(100)        NOT NULL,
    zona     VARCHAR(50)         NOT NULL,
    contacto VARCHAR(50)         NOT NULL,
    email    VARCHAR(50)         NOT NULL
);

CREATE TABLE motivos
(
    id     SERIAL PRIMARY KEY,
    motivo VARCHAR(50) NOT NULL
);

CREATE TABLE produtos
(
    id         SERIAL PRIMARY KEY,
    tipo       VARCHAR(50) NOT NULL,
    marca      VARCHAR(50) NOT NULL,
    modelo     VARCHAR(50) NOT NULL,
    num_serie  VARCHAR(50) NOT NULL,
    cliente_id BIGINT(20) UNSIGNED,
    FOREIGN KEY (cliente_id) REFERENCES clientes (nif) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE visitas
(
    id         SERIAL PRIMARY KEY,
    cliente_id BIGINT(20) UNSIGNED,
    ult_vis    DATE        NOT NULL,
    motivo_id  BIGINT(20) UNSIGNED,
    prox_vis   DATE        NOT NULL,
    descricao  TEXT        NOT NULL,
    tecnico    VARCHAR(50) NOT NULL,
    produto_id BIGINT(20) UNSIGNED,
    FOREIGN KEY (cliente_id) REFERENCES clientes (nif) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (motivo_id) REFERENCES motivos (id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (produto_id) REFERENCES produtos (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE assistencias
(
    id         SERIAL PRIMARY KEY,
    cliente_id BIGINT(20) UNSIGNED,
    produto_id BIGINT(20) UNSIGNED,
    data_p     DATE        NOT NULL,
    motivo     VARCHAR(20) NOT NULL,
    problema   TEXT        NOT NULL,
    resolucao  TEXT,
    material   TEXT,
    data_i     DATE,
    FOREIGN KEY (cliente_id) REFERENCES clientes (nif) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (produto_id) REFERENCES produtos (id) ON UPDATE CASCADE ON DELETE CASCADE
);


INSERT INTO motivos
VALUES (1, 'Apresentação'),
       (2, 'Visita'),
       (3, 'Reunião'),
       (4, 'Tele-Marketing'),
       (5, 'Possível Negócio'),
       (6, 'Análise de Proposta'),
       (7, 'Envio de Proposta'),
       (8, 'Entrega de Encomendas');

INSERT INTO clientes (nif, id, cliente, zona, contacto, email)
VALUES (100000000, 614, "Minerva", "Heredia", "1-471-912-2989", "tincidunt@scelerisquescelerisque.com"),
       (100000001, 856, "Grady", "Ontario", "1-561-886-5513", "Cras.pellentesque.Sed@nislNulla.edu"),
       (100000002, 622, "Keely", "Ank", "1-926-205-8588", "at@nunc.com"),
       (100000003, 247, "Hop", "Alberta", "1-793-689-6655", "imperdiet.ornare.In@Integerid.com"),
       (100000004, 470, "Jonas", "BU", "1-862-222-4145", "tellus@non.edu"),
       (100000005, 259, "Declan", "Sokoto", "1-313-252-6265", "In@Cras.co.uk"),
       (100000006, 386, "Fuller", "AU", "1-698-442-4165", "nec.eleifend.non@velarcueu.edu"),
       (100000007, 392, "Grace", "Aragón", "1-649-259-7303", "Mauris@Maecenas.ca"),
       (100000008, 49, "Adara", "SK", "1-853-192-0230", "hendrerit.a.arcu@acturpisegestas.org"),
       (100000009, 463, "Austin", "Chu", "1-781-441-7204", "in.dolor.Fusce@risus.net"),
       (100000010, 609, "Belle", "Ceará", "1-138-213-4325", "metus.In@tellus.edu"),
       (100000011, 459, "Nora", "Zl", "1-736-709-7613", "vehicula@etmagnisdis.net"),
       (100000012, 178, "Palmer", "BA", "1-884-406-3339", "sit.amet@molestie.edu"),
       (100000013, 776, "Leigh", "W", "1-444-973-1649", "sagittis@et.net"),
       (100000014, 740, "Regan", "Ank", "1-474-706-7317", "lacinia.orci.consectetuer@augue.co.uk"),
       (100000015, 644, "Donna", "Luxemburg", "1-465-102-8945", "risus.Donec@lacus.ca"),
       (100000016, 355, "Amelia", "Uttarakhand", "1-495-254-6171", "arcu.iaculis.enim@pedeacurna.org"),
       (100000017, 317, "Jasper", "Mer", "1-649-406-0975", "nunc.est.mollis@aliquamiaculis.edu"),
       (100000018, 301, "Martha", "Campania", "1-662-679-7402", "gravida.sit@magnisdisparturient.net"),
       (100000019, 932, "Demetrius", "UT", "1-154-328-1916", "velit.Pellentesque@placeratCrasdictum.co.uk");

INSERT INTO produtos (id, tipo, marca, modelo, num_serie, cliente_id)
VALUES (1, "est,", "metus", "Aliquam", "WQT80EDE3LZ", 100000013),
       (2, "tellus", "est", "semper", "DOW12EDB6XF", 100000013),
       (3, "ut", "parturient", "tellus.", "TYO87TMD1WZ", 100000007),
       (4, "eget", "facilisis", "dolor.", "EPR92OPZ4KK", 100000014),
       (5, "magna.", "non", "et", "TDX01ZNH7SP", 100000003),
       (6, "cursus.", "in", "sodales", "WSH77RCW1HZ", 100000018),
       (7, "auctor,", "Cras", "et,", "YDP53COY2VX", 100000003),
       (8, "mauris", "magna", "magna.", "FUH89DOU3LX", 100000006),
       (9, "sit", "dictum.", "In", "YNM28ZPQ3NF", 100000012),
       (10, "dui.", "blandit", "metus", "NQB21YWE3RW", 100000005),
       (11, "eget,", "eget", "urna", "WOO28GOH0FR", 100000007),
       (12, "eu", "egestas", "sit", "UPY59SAB2CG", 100000006),
       (13, "mi", "vitae", "euismod", "WID04YHL9JL", 100000007),
       (14, "arcu.", "libero.", "Cras", "IEO65DQM9EP", 100000011),
       (15, "Mauris", "diam", "lacus.", "MLU97KCS2ZI", 100000014),
       (16, "at", "natoque", "Donec", "OXD90CHS0GG", 100000017),
       (17, "magna.", "Quisque", "suscipit,", "CIR31OUY7ZO", 100000013),
       (18, "erat.", "mi.", "eu", "ZLP49JZZ6HV", 100000015),
       (19, "pellentesque,", "scelerisque", "vel", "NEG20ILR4CI", 100000001),
       (20, "hymenaeos.", "et", "erat", "DFY35XAV8GT", 100000017),
       (21, "quis,", "malesuada", "In", "LET17XUS8IA", 100000018),
       (22, "scelerisque", "Mauris", "elit.", "MBG90PAN6JT", 100000004),
       (23, "ornare", "justo", "Cras", "PBQ87FUB1DK", 100000004),
       (24, "adipiscing", "fringilla", "ultricies", "VDS03YDP0AM", 100000011),
       (25, "aliquam", "Duis", "sed", "TNW17NQV7CL", 100000004),
       (26, "accumsan", "Proin", "ligula.", "RFI98FJL7OC", 100000015),
       (27, "Curabitur", "rutrum", "Donec", "DVN43QLV7AM", 100000015),
       (28, "massa.", "nunc", "arcu", "WGP71ZXU0QS", 100000009),
       (29, "massa", "nisl.", "tellus.", "ANQ17BOJ1VK", 100000019),
       (30, "euismod", "litora", "id,", "SWE67XQU8GO", 100000014),
       (31, "neque.", "vulputate", "suscipit", "VLR27SUY3UC", 100000009),
       (32, "augue", "ultrices,", "Proin", "GTO82AXJ7RO", 100000008),
       (33, "Suspendisse", "neque", "a", "UXN89HJI9AI", 100000014),
       (34, "ut", "Aliquam", "Ut", "GNA30SHA6RB", 100000012),
       (35, "vitae,", "risus", "lorem,", "BRX01LIF2WE", 100000008),
       (36, "eu,", "urna.", "sodales", "VCE04TUQ3VB", 100000011),
       (37, "odio.", "Nullam", "libero.", "YJD62LHL8QZ", 100000001),
       (38, "ipsum.", "tellus", "elit.", "IRT61IZX9UD", 100000019),
       (39, "Donec", "ipsum", "aliquet.", "GKR46WRX1TL", 100000009),
       (40, "nulla", "ullamcorper,", "venenatis", "QAS64XWS9GN", 100000013),
       (41, "ligula.", "ultrices", "erat", "CJD77IUP5FP", 100000017),
       (42, "ullamcorper", "vestibulum,", "fermentum", "EWU46FDS6PL", 100000016),
       (43, "neque", "felis.", "non", "WDR13SKT0KC", 100000013),
       (44, "varius", "malesuada", "eget", "GWS03TPC7ZK", 100000013),
       (45, "in", "id,", "pellentesque", "MLM14GAL5JE", 100000010),
       (46, "enim.", "aliquet,", "dapibus", "WOF40DJT5GO", 100000014),
       (47, "auctor", "Aliquam", "Sed", "CLH29YJW9RX", 100000011),
       (48, "Cras", "et", "metus", "EHO75KPP4DN", 100000007),
       (49, "pede,", "tristique", "dolor", "JUH22VCI0EH", 100000003),
       (50, "natoque", "lacinia", "euismod", "CLZ08XET8HB", 100000011),
       (51, "tellus", "cursus", "augue", "NDY09XSV4QW", 100000017),
       (52, "Nunc", "Suspendisse", "facilisis", "NSK52EEA8LL", 100000009),
       (53, "mauris", "purus", "Cras", "RKC00CBE4EN", 100000005),
       (54, "Donec", "placerat,", "molestie", "NJT04HNW2ZA", 100000012),
       (55, "eu", "parturient", "vel", "MGO57STI2ZG", 100000012),
       (56, "luctus.", "turpis.", "erat", "XML99BOU1LS", 100000016),
       (57, "elementum,", "parturient", "tempor", "LFQ49BAR2GS", 100000015),
       (58, "tempus", "ut", "lacus", "TPT93OMF7HO", 100000015),
       (59, "nibh", "a,", "Duis", "SZW19YAT2ZD", 100000003),
       (60, "Nunc", "orci.", "dignissim", "KGN90CYA8BW", 100000013),
       (61, "aliquet", "ac", "dapibus", "IDB91SOU3VG", 100000019),
       (62, "Mauris", "hendrerit", "quis", "ZZJ48AGP9RF", 100000007),
       (63, "est.", "consequat,", "diam", "KFP07MYI2PV", 100000000),
       (64, "nisi", "quam", "a", "IRJ23QIW1VM", 100000008),
       (65, "vel,", "Sed", "ultrices", "XTD07BTE5XA", 100000001),
       (66, "in,", "nonummy.", "a,", "XTR48YWJ8ZC", 100000018),
       (67, "Nullam", "facilisis", "et,", "CLP36NVL5UP", 100000000),
       (68, "cursus", "mauris", "feugiat", "PDO36LYC8HF", 100000009),
       (69, "faucibus.", "Vivamus", "sollicitudin", "JCG96WLK4ND", 100000011),
       (70, "condimentum", "Duis", "at", "BPD19UHP2CM", 100000006),
       (71, "turpis.", "vel", "Donec", "AUR90QML4UK", 100000003),
       (72, "ultricies", "faucibus", "quis,", "CKM76ENI3TB", 100000001),
       (73, "vel,", "arcu", "ultricies", "SIT06WPI5TO", 100000013),
       (74, "arcu.", "turpis", "eleifend,", "TQZ98SLJ1TM", 100000011),
       (75, "urna.", "tincidunt", "cursus.", "PSS33DRQ4CZ", 100000018),
       (76, "dolor,", "nunc", "Curabitur", "WIP55RMH1GN", 100000000),
       (77, "Sed", "Sed", "montes,", "LZP32SYJ4DG", 100000012),
       (78, "ultrices", "luctus", "cursus", "ASS46PET2UO", 100000005),
       (79, "Morbi", "et", "Proin", "PCB21KKK4UH", 100000007),
       (80, "purus.", "egestas.", "cursus", "SYI26WJM2LT", 100000014),
       (81, "orci", "ullamcorper.", "in", "LFQ98KXV0TU", 100000016),
       (82, "purus.", "sapien", "erat.", "RPA06VSK3MN", 100000012),
       (83, "senectus", "Aenean", "Nunc", "SXB58XFG7HY", 100000004),
       (84, "a,", "ornare", "Nam", "LIT64PVZ0EW", 100000016),
       (85, "Mauris", "semper", "ipsum", "EFT88QAY5RS", 100000008),
       (86, "sed", "Etiam", "Nulla", "CDM79HDY7QA", 100000005),
       (87, "quis", "vehicula", "placerat", "UAO40RKQ1ZY", 100000016),
       (88, "Cras", "In", "sed", "YFU63JHH8HI", 100000016),
       (89, "facilisis", "ultricies", "ante.", "JLV90DPT8UV", 100000006),
       (90, "nunc,", "cursus", "In", "LDK50WKL2FD", 100000012),
       (91, "eget", "et", "nec", "IFO02IZH1XN", 100000000),
       (92, "molestie", "sem", "Phasellus", "EYS96GJQ6DU", 100000005),
       (93, "ut", "faucibus", "pharetra.", "VEC66LSJ6YX", 100000002),
       (94, "pede", "pretium", "Mauris", "NKL91GOJ7DE", 100000004),
       (95, "vitae,", "est,", "at", "XLG11IAN4FE", 100000005),
       (96, "luctus,", "malesuada", "dolor", "UQE87RAJ3ZB", 100000018),
       (97, "arcu", "consectetuer,", "enim.", "LTY97XFX6YU", 100000013),
       (98, "lectus", "Nunc", "commodo", "DQS01ZEZ6YO", 100000004),
       (99, "justo", "Cum", "cursus,", "IRB99ZCN4KZ", 100000006),
       (100, "ut", "cursus", "accumsan", "LAY50AIV8ZB", 100000003);

INSERT INTO visitas (id, cliente_id, ult_vis, motivo_id, prox_vis, descricao, tecnico, produto_id)
VALUES (1, 100000001, "2020/05/15", 4, "2020/08/26",
        "leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a,", "Mason", 3),
       (2, 100000007, "2020/03/23", 9, "2020/08/29",
        "volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor",
        "Norman", 75),
       (3, 100000006, "2021/01/11", 7, "2020/07/30",
        "Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia", "Hall", 91),
       (4, 100000001, "2021/01/05", 8, "2021/06/01",
        "Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus.",
        "Adrian", 40),
       (5, 100000015, "2020/11/04", 2, "2021/05/13",
        "tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede",
        "Keith", 68),
       (6, 100000014, "2020/09/02", 7, "2021/03/01",
        "eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui", "Emerson", 48),
       (7, 100000011, "2019/09/23", 10, "2020/09/07", "ac metus vitae velit egestas lacinia. Sed congue, elit sed",
        "Eric", 25),
       (8, 100000013, "2020/09/03", 1, "2020/07/14",
        "eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc.",
        "Troy", 75),
       (9, 100000015, "2021/01/23", 10, "2021/06/12",
        "placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer", "Wallace", 26),
       (10, 100000003, "2019/08/28", 9, "2021/05/02",
        "felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo",
        "Dalton", 75),
       (11, 100000007, "2021/03/12", 4, "2019/07/27",
        "eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras",
        "Carlos", 69),
       (12, 100000012, "2020/04/14", 2, "2019/10/27",
        "Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula",
        "Rashad", 9),
       (13, 100000001, "2021/03/16", 8, "2020/02/12",
        "vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet",
        "Nigel", 65),
       (14, 100000000, "2020/02/16", 3, "2020/12/17",
        "Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae,",
        "Sean", 62),
       (15, 100000000, "2021/02/04", 8, "2020/12/24",
        "mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a", "Dale", 24),
       (16, 100000015, "2020/08/12", 11, "2021/05/27",
        "diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam",
        "Jason", 2),
       (17, 100000006, "2021/05/21", 10, "2019/10/08",
        "nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum",
        "Laith", 9),
       (18, 100000019, "2019/08/20", 6, "2020/08/07",
        "montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula",
        "Zephania", 25),
       (19, 100000005, "2020/12/04", 2, "2020/09/30",
        "sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci", "Arthur", 92),
       (20, 100000014, "2020/03/09", 9, "2021/03/23",
        "ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit", "Adrian",
        11),
       (21, 100000006, "2019/09/29", 4, "2021/01/31",
        "non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu",
        "Fritz", 73),
       (22, 100000002, "2020/12/25", 5, "2019/09/24",
        "eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In",
        "Keith", 30),
       (23, 100000003, "2021/04/11", 4, "2020/11/26",
        "quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes,", "Abel", 21),
       (24, 100000011, "2020/11/01", 5, "2020/06/11",
        "tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum", "Galvin", 59),
       (25, 100000019, "2020/04/26", 7, "2019/10/18",
        "iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque", "Avram", 40),
       (26, 100000013, "2020/09/10", 11, "2019/07/19",
        "fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna.",
        "Chester", 49),
       (27, 100000001, "2020/10/25", 1, "2021/06/06",
        "rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a", "Reece", 46),
       (28, 100000006, "2021/05/02", 2, "2019/10/04",
        "sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh",
        "Flynn", 97),
       (29, 100000012, "2021/02/27", 5, "2021/04/11",
        "magna tellus faucibus leo, in lobortis tellus justo sit amet nulla.", "Kevin", 70),
       (30, 100000015, "2020/03/22", 1, "2019/07/21",
        "Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor,", "Driscoll", 47),
       (31, 100000004, "2019/12/23", 8, "2019/07/03",
        "consectetuer adipiscing elit. Aliquam auctor, velit eget laoreet posuere, enim nisl elementum purus, accumsan interdum libero",
        "Andrew", 71),
       (32, 100000019, "2019/10/05", 9, "2021/02/15",
        "nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis", "Colby", 49),
       (33, 100000015, "2020/08/01", 6, "2021/06/07",
        "at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi,",
        "Xander", 13),
       (34, 100000014, "2020/01/20", 3, "2021/05/02",
        "cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam", "Paki", 7),
       (35, 100000005, "2021/05/06", 11, "2021/05/22",
        "tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue",
        "Paul", 70),
       (36, 100000011, "2020/02/20", 3, "2020/06/03",
        "velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est", "Neville", 3),
       (37, 100000019, "2021/02/23", 1, "2020/08/31",
        "auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est.",
        "Isaiah", 57),
       (38, 100000015, "2021/03/17", 4, "2019/10/03",
        "interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum.", "Colt", 3),
       (39, 100000001, "2020/12/27", 11, "2020/11/23",
        "luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque",
        "Lewis", 49),
       (40, 100000019, "2019/07/13", 9, "2021/03/12",
        "malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet",
        "Arden", 77),
       (41, 100000014, "2020/10/01", 4, "2020/12/12",
        "sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum", "Zeus", 51),
       (42, 100000004, "2021/01/24", 10, "2021/04/15",
        "Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla.", "Malachi", 79),
       (43, 100000019, "2021/04/19", 2, "2020/12/29",
        "amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus", "Chadwick",
        79),
       (44, 100000014, "2019/12/28", 8, "2020/04/16",
        "id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum.",
        "August", 58),
       (45, 100000015, "2020/11/01", 7, "2020/11/27",
        "scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit", "Amery", 44),
       (46, 100000004, "2019/09/04", 8, "2020/09/20",
        "consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus.",
        "Garth", 20),
       (47, 100000018, "2019/11/05", 11, "2021/07/01",
        "In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac",
        "Ivor", 71),
       (48, 100000017, "2021/01/08", 1, "2020/05/23",
        "ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida", "Daniel", 90),
       (49, 100000014, "2021/04/14", 5, "2019/12/10",
        "Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare,",
        "Flynn", 53),
       (50, 100000009, "2019/12/29", 10, "2020/12/03",
        "Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse",
        "Nathan", 100),
       (51, 100000015, "2020/09/20", 2, "2020/09/01",
        "ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae,",
        "Carter", 72),
       (52, 100000013, "2020/11/27", 6, "2020/06/15",
        "faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie",
        "Ali", 12),
       (53, 100000016, "2019/07/09", 6, "2020/03/27",
        "rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam",
        "Armand", 9),
       (54, 100000007, "2020/02/12", 1, "2020/01/12",
        "gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum", "Ronan", 54),
       (55, 100000018, "2019/07/21", 1, "2020/12/22",
        "non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede.", "Declan", 4),
       (56, 100000005, "2019/10/06", 5, "2020/04/02",
        "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac", "Ashton", 86),
       (57, 100000010, "2020/12/10", 9, "2021/02/20",
        "eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet,",
        "Mufutau", 73),
       (58, 100000016, "2019/10/18", 6, "2021/03/08",
        "ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus.",
        "Leo", 62),
       (59, 100000016, "2021/01/17", 8, "2019/12/09",
        "dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris", "Rafael", 33),
       (60, 100000013, "2019/10/11", 2, "2021/03/23",
        "ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a", "Arden", 44),
       (61, 100000019, "2020/12/21", 4, "2021/01/02",
        "mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus.",
        "Julian", 13),
       (62, 100000014, "2020/10/24", 7, "2019/07/15",
        "dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris",
        "Vernon", 39),
       (63, 100000007, "2021/06/10", 3, "2021/06/20",
        "non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et,", "Sawyer", 26),
       (64, 100000008, "2019/11/10", 10, "2020/09/10",
        "magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec", "Donovan", 46),
       (65, 100000011, "2020/09/28", 10, "2020/04/30",
        "auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus",
        "Odysseus", 18),
       (66, 100000010, "2021/03/13", 8, "2020/04/24",
        "scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus", "Ralph", 90),
       (67, 100000011, "2019/08/25", 10, "2019/10/21",
        "ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel", "James",
        14),
       (68, 100000013, "2020/12/09", 2, "2019/08/20",
        "Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer,",
        "Matthew", 33),
       (69, 100000008, "2020/09/05", 3, "2021/05/08",
        "mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus",
        "Hedley", 88),
       (70, 100000000, "2021/07/01", 1, "2020/07/23",
        "arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui,",
        "Mason", 20),
       (71, 100000019, "2020/12/09", 10, "2021/03/29",
        "pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit", "Fitzgerald",
        90),
       (72, 100000008, "2019/10/02", 7, "2020/09/30",
        "nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis",
        "Ferdinand", 27),
       (73, 100000009, "2020/03/25", 2, "2019/11/09",
        "nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut",
        "Dalton", 29),
       (74, 100000003, "2020/06/27", 1, "2019/11/21", "mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed",
        "Myles", 35),
       (75, 100000004, "2020/11/19", 10, "2020/08/04",
        "vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus", "Dane", 13),
       (76, 100000001, "2020/03/10", 10, "2019/11/26",
        "mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus",
        "Harrison", 85),
       (77, 100000002, "2019/10/10", 3, "2019/09/04",
        "cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum", "Chandler", 6),
       (78, 100000009, "2020/09/12", 11, "2020/07/21",
        "turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla", "Vladimir",
        46),
       (79, 100000016, "2020/04/23", 8, "2019/09/26",
        "nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui.", "Lamar", 54),
       (80, 100000015, "2020/09/01", 9, "2021/05/12",
        "velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu",
        "Cody", 54),
       (81, 100000010, "2020/07/23", 1, "2021/05/19",
        "eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient",
        "Derek", 37),
       (82, 100000007, "2020/09/05", 10, "2021/01/19",
        "aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam", "Gil", 72),
       (83, 100000002, "2020/05/24", 5, "2021/05/05",
        "sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam",
        "Cole", 26),
       (84, 100000003, "2021/01/06", 2, "2021/05/29",
        "erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at", "Rajah",
        100),
       (85, 100000002, "2019/09/05", 2, "2021/02/07",
        "Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut", "Ivan",
        20),
       (86, 100000016, "2020/11/16", 1, "2021/05/17",
        "at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat",
        "Jeremy", 43),
       (87, 100000017, "2020/01/24", 7, "2021/04/05",
        "malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut",
        "Derek", 84),
       (88, 100000001, "2019/11/20", 7, "2020/06/25",
        "Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est.", "Barry", 45),
       (89, 100000018, "2020/09/27", 2, "2021/05/26",
        "et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum",
        "Ulric", 59),
       (90, 100000008, "2019/07/15", 8, "2020/04/08",
        "sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci", "Clark", 65),
       (91, 100000014, "2020/09/05", 7, "2021/04/19",
        "lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum", "Gray", 17),
       (92, 100000000, "2021/06/18", 7, "2019/12/23",
        "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero", "Isaac", 58),
       (93, 100000004, "2020/12/07", 10, "2019/08/15",
        "non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh.",
        "Dane", 34),
       (94, 100000011, "2021/02/28", 3, "2019/09/06",
        "gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla",
        "Brody", 66),
       (95, 100000006, "2021/04/18", 4, "2021/02/20",
        "odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia",
        "Harper", 99),
       (96, 100000004, "2020/07/22", 11, "2020/02/19",
        "sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum", "Uriel", 86),
       (97, 100000000, "2019/10/06", 10, "2021/02/10",
        "auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus", "Axel", 5),
       (98, 100000013, "2020/10/20", 6, "2021/02/21",
        "nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin",
        "Preston", 46),
       (99, 100000010, "2020/08/07", 10, "2019/10/31",
        "lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis",
        "Odysseus", 19),
       (100, 100000002, "2019/11/08", 3, "2020/11/10",
        "Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit",
        "Isaiah", 14);
