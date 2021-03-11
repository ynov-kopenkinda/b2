#include "contactlist.h"

ContactList::ContactList(QString filename)
{
    this->m_ContactsFilename = filename;
}

void ContactList::add(Contact contact)
{
    this->m_Contacts.append(contact);
}

void ContactList::load()
{
    qDebug() << "Started loading";
    this->m_Contacts.clear();
    QFile contactsFile(this->m_ContactsFilename);
    if (contactsFile.open(QIODevice::ReadWrite | QIODevice::Text)) {
        QTextStream stream(&contactsFile);
        QString data = stream.readAll();
        QStringList contacts = data.split("\n");
        for (auto& contact : contacts) {
            QStringList contactData = contact.split("|");
            Contact *c = new Contact(contactData.at(0), contactData.at(1));
            this->add(*c);
        }
        contactsFile.close();
    } else {
        QString errorText("Couldn't read contacts file. Conslusion: Not Poggers");
        qCritical() << errorText;
    }
}
