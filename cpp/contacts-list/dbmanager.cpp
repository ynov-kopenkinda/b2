#include "dbmanager.h"

ContactsDBManager::ContactsDBManager()
{
    m_DB = QSqlDatabase::addDatabase("QSQLITE");
}

void ContactsDBManager::changePath(const QString &path)
{
    m_DB.setDatabaseName(path);
    if (!m_DB.open()) {
       qDebug() << "Error: connection with database failed";
    } else {
       qDebug() << "Database: connection ok";
    }
}

QVector<Contact *> ContactsDBManager::getAll()
{
    QSqlQuery query;
    query.prepare("SELECT * FROM contacts");
    int idName = query.record().indexOf("name");
    int idSurname = query.record().indexOf("surname");
    int idEmail = query.record().indexOf("email");
    int idPhone = query.record().indexOf("phone");
    int idCommentary = query.record().indexOf("commentary");
    QVector<Contact*> contacts;
    while (query.next()) {
        contacts.append(new Contact(
                            query.value(idName).toString(),
                            query.value(idSurname).toString(),
                            query.value(idEmail).toString(),
                            query.value(idPhone).toString(),
                            query.value(idCommentary).toString()
                        ));
    }
    return contacts;
}

void ContactsDBManager::addContact(Contact *contact)
{
    QSqlQuery query;
    query.prepare("INSERT INTO contacts (name, surname, email, phone, commentary) VALUES (:name, :surname, :email, :phone, :commentary)");
    query.bindValue(":name", contact->Name());
    query.bindValue(":surname", contact->Surname());
    query.bindValue(":email", contact->Email());
    query.bindValue(":phone", contact->Phone());
    query.bindValue(":commentary", contact->Commentary());
    if (!query.exec()) {
        qDebug() << __PRETTY_FUNCTION__ << ": " << query.lastError();
    }
}

void ContactsDBManager::bulkUpdate(QVector<Contact *> contacts)
{
    QSqlQuery query;
    query.prepare("DELETE FROM contacts");
    query.exec();
    for (auto contact : contacts) {
        this->addContact(contact);
    }
}

QVector<Contact*> ContactsDBManager::mockDB()
{
    QVector<Contact*> defaultContacts = QVector<Contact*>();
    defaultContacts.append(new Contact("Danny",
                                       "Swanson",
                                       "nicklaus1997@gmail.com",
                                       "715-606-6914",
                                       R"(No.: 379988763
issued: June/18/2011
expires: June/17/2021
P<USASWANSON<<DANNY<<<<<<<<<<<<<<<<<<<<<<<<<
3799887636USA7903264M2106170524156151<928848)"
                                       ));
    defaultContacts.append(new Contact("Rachel",
                                       "Maxwell",
                                       "emerald2011@gmail.com",
                                       "857-300-1981",
                                       R"(No.: 716978305
issued: September/13/2014
expires: September/12/2024
P<USAMAXWELL<<RACHEL<<<<<<<<<<<<<<<<<<<<<<<<
7169783056USA7307243F2409129698324257<086567)"
                                       ));
    defaultContacts.append(new Contact("Alan",
                                       "Rodriguez",
                                       "rico1997@gmail.com",
                                       "616-397-2523",
                                       R"(No.: 980068522
issued: June/17/2014
expires: June/16/2024
P<USARODRIGUEZ<<ALAN<<<<<<<<<<<<<<<<<<<<<<<<
9800685226USA730691M2406167692216916<723016)"
                                       ));
    for(auto contact : qAsConst(defaultContacts)) {
        this->addContact(contact);
    }
    return defaultContacts;
}
