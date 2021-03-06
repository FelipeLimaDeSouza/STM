DROP DATABASE IF EXISTS bd_ponto;
CREATE DATABASE bd_ponto;
USE bd_ponto;

CREATE TABLE tb_user(

	user_id						INT					AUTO_INCREMENT				NOT NULL,
    user_nome					VARCHAR(100)		NOT NULL,
    user_email					VARCHAR(100)		NOT NULL,
    user_senha					VARCHAR(50)			NOT NULL,
    user_status					INT					NOT NULL					DEFAULT 1,
    user_ip						VARCHAR(20)			NULL,
    user_tipo					INT					NOT NULL,
    PRIMARY KEY(user_id),
    UNIQUE KEY(user_email)

);

CREATE TABLE tb_ponto(

	ponto_id					INT					AUTO_INCREMENT				NOT NULL,
    ponto_data					DATE				NOT NULL,
    ponto_entrada				TIME				NULL,
    ponto_almoco				TIME				NULL,
    ponto_volta_almoco			TIME				NULL,
    ponto_saida					TIME				NULL,
    user_id_ponto				INT					NOT NULL,
    PRIMARY KEY(ponto_id),
    CONSTRAINT fk_usu_pon FOREIGN KEY(user_id_ponto) REFERENCES tb_user(user_id)

);

INSERT INTO tb_user(user_nome, user_email, user_senha, user_ip, user_tipo)
VALUES('Felipe Lima de Souza', 'felipe@stm-sistema.com.br', md5('123456'), null, 1);
CREATE EVENT cria_ponto
    ON SCHEDULE EVERY 1 MINUTE 
    DO
        INSERT INTO tb_ponto(ponto_data, user_id_ponto)
        SELECT CURDATE(), user_id FROM tb_user 
            WHERE user_id NOT IN (select user_id_ponto FROM tb_ponto 
                                    WHERE ponto_data = CURDATE() AND user_id_ponto = user_id)