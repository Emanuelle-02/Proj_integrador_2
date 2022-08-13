from config import db

class Solicitacoes(db.Model):
  id_solicitacao = db.Column(db.Integer, primary_key=True)
  id_cliente = db.Column(db.Integer, db.ForeignKey('farmacias.id'))
  nome = db.Column(db.String(50))
  rua = db.Column(db.String(50))
  numero = db.Column(db.Integer)
  bairro = db.Column(db.String(50))
  cidade = db.Column(db.String(50))
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def to_json(self):
    return {
      "id_solicitacao": self.id_solicitacao,
      "id_cliente": self.id_cliente,
      "nome": self.nome,
      "rua": self.rua,
      "numero": self.numero,
      "bairro": self.bairro,
      "cidade": self.cidade,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }