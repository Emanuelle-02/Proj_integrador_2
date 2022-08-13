from config import db

class Entregas(db.Model):
  id_entrega = db.Column(db.Integer, primary_key=True)
  id_cliente = db.Column(db.Integer, db.ForeignKey('farmacias.id'))
  id_entregador = db.Column(db.Integer, db.ForeignKey('entregadores.id_entregador'))
  entrega_status = db.Column(db.String(30), default="Pendente")
  created_at  = db.Column(db.DateTime, server_default=db.func.now())
  updated_at = db.Column(db.DateTime, server_default=db.func.now(), server_onupdate=db.func.now())

  def to_json(self):
    return {
      "id_entrega": self.id_entrega,
      "id_cliente": self.id_cliente,
      "id_entregador": self.id_entregador,
      "entrega_status": self.entrega_status,
      "created_at": self.created_at,
      "updated_at": self.updated_at
    }