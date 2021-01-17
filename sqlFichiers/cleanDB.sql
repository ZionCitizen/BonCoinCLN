delete from utilisateur;
delete from annonce;
delete from image;
delete from message;

alter table utilisateur AUTO_INCREMENT=1;
alter table annonce AUTO_INCREMENT=1;
alter table image AUTO_INCREMENT=1;
alter table message AUTO_INCREMENT=1;