from config import db

class Entregas(db.Model):
  id_entrega = db.Column(db.Integer, primary_key=True)
  medicamento = db.Column(db.String(350))
  nome = db.Column(db.String(50))
  rua = db.Column(db.String(50))
  numero = db.Column(db.Integer)
  bairro = db.Column(db.String(50))
  cidade = db.Column(db.String(50))
  cep = db.Column(db.String(10))
  preco = db.Column(db.String(100))
  id_cliente = db.Column(db.Integer, db.ForeignKey('farmacias.id'))
  id_entregador = db.Column(db.Integer, db.ForeignKey('entregadores.id_entregador'))
  entrega_status = db.Column(db.String(30), default="Pendente")
  active = db.Column(db.Boolean, default=True)
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def to_json(self):
    return {
      "id_entrega": self.id_entrega,
      "medicamento": self.medicamento,
      "nome": self.nome,
      "rua": self.rua,
      "numero": self.numero,
      "bairro": self.bairro,
      "cidade": self.cidade,
      "cep": self.cep,
      "preco": self.preco,
      "id_cliente": self.id_cliente,
      "id_entregador": self.id_entregador,
      "entrega_status": self.entrega_status,
      "active": self.active,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }