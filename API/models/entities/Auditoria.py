from config import db

class Auditoria(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    coluna_alterada = db.Column(db.String(100))
    old_status = db.Column(db.String(100))
    new_status = db.Column(db.String(100))
    user_action = db.Column(db.String(100))
    created_at  = db.Column(db.DateTime, server_default=db.func.now())

    def to_json(self):
        return {
            "id": self.id,
            "coluna_alterada": self.coluna_alterada,
            "old_status": self.old_status,
            "new_status": self.new_status,
            "user_action": self.user_action,
            "created_at": self.created_at
        }

