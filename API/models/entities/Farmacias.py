from config import db

class Farmacias(db.Model):
  id = db.Column(db.Integer, primary_key=True)
  nome_farmacia = db.Column(db.String(50))
  email = db.Column(db.String(50))
  cnpj = db.Column(db.String(50))
  telefone = db.Column(db.String(50))
  rua = db.Column(db.String(50))
  numero = db.Column(db.Integer)
  bairro = db.Column(db.String(50))
  cidade = db.Column(db.String(50))
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def to_json(self):
    return {
      "id": self.id,
      "nome_farmacia": self.nome_farmacia,
      "email": self.email,
      "cnpj": self.cnpj,
      "telefone": self.telefone,
      "rua": self.rua,
      "numero": self.numero,
      "bairro": self.bairro,
      "cidade": self.cidade,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }