from sqlalchemy import ForeignKey, String, Column, Integer, DateTime
from sqlalchemy.orm import DeclarativeBase, Mapped, mapped_column
from .base import Base
import datetime


class Todo(Base):
    __tablename__ = "todos"
    id: Mapped[int] = mapped_column(primary_key=True)
    title: Mapped[str] = mapped_column(String(30))
    description: Mapped[str] = mapped_column(String(255))
    created_at = Column(DateTime, default=datetime.datetime.utcnow)
    updated_at = Column(DateTime, default=datetime.datetime.utcnow)
