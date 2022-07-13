DROP TABLE IF EXISTS farmacias;

CREATE TABLE farmacias (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nome_farmacia VARCHAR(50) NOT NULL,
  email VARCHAR(50),
  cnpj VARCHAR(50) NOT NULL,
  telefone VARCHAR(30),
  rua VARCHAR(50),
  numero INTEGER,
  bairro VARCHAR(30),
  cidade VARCHAR(30),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS entregadores;

CREATE TABLE entregadores (
  id_entregador INTEGER PRIMARY KEY AUTOINCREMENT,
  nome VARCHAR(50) NOT NULL,
  cpf VARCHAR(30) UNIQUE NOT NULL,
  email VARCHAR(50) UNIQUE NOT NULL,
  telefone VARCHAR(30) UNIQUE NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS entregas;

CREATE TABLE entregas (
  id_entrega INTEGER PRIMARY KEY AUTOINCREMENT,
  id_cliente INTEGER,
  id_entregador INTEGER,
  nome VARCHAR(50) NOT NULL,
  rua VARCHAR(50) NOT NULL,
  numero INTEGER NOT NULL,
  bairro VARCHAR(30) NOT NULL,
  cidade VARCHAR(30) NOT NULL,
  entrega_status VARCHAR(30),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_cliente) REFERENCES farmacias(id),
  FOREIGN KEY (id_entregador) REFERENCES entregadores(id_entregador)  
);

DROP TABLE IF EXISTS entregas_auditoria;
CREATE TABLE entregas_auditoria (
	id INTEGER PRIMARY KEY,
  coluna_alterada TEXT,
	old_status TEXT,
	new_status TEXT,
	user_action TEXT,
	created_at TEXT
);

CREATE TRIGGER log_entregas_after_update 
   AFTER UPDATE ON entregas
   WHEN old.entrega_status <> new.entrega_status
BEGIN
	INSERT INTO entregas_auditoria (
		coluna_alterada,
		old_status,
		new_status,
		user_action,
		created_at
	)
VALUES
	(
		'entrega_status',
		old.entrega_status,
		new.entrega_status,
		'UPDATE',
		DATETIME('NOW')
	) ;
END;

DROP TABLE IF EXISTS pagamento;
CREATE TABLE pagamento (
  id_pagamento INTEGER PRIMARY KEY AUTOINCREMENT,
  id_entrega INTEGER,
  forma_pagamento VARCHAR(50),
  valor_total INTEGER,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_entrega) REFERENCES entregas(id)
  );