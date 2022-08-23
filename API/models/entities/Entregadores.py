from config import db

class Entregadores(db.Model):
  id_entregador = db.Column(db.Integer, primary_key=True)
  nome = db.Column(db.String(50))
  cpf = db.Column(db.String(30), unique=True)
  email = db.Column(db.String(50), unique=True)
  telefone = db.Column(db.String(50), unique=True)
  active = db.Column(db.Boolean, default=True)
  senha = db.Column(db.String(50))
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def to_json(self):
    return {
      "id_entregador": self.id_entregador,
      "nome": self.nome,
      "cpf": self.cpf,
      "email": self.email,
      "telefone": self.telefone,
      "active": self.active,
      "senha": self.senha,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }