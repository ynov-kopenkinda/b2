#include "contact.h"

Contact::Contact(QString name, QString email) {
    this->m_Name = name;
    this->m_Email = email;
}

QString Contact::toString() const
{
    return this->m_Name + " <" + this->m_Email + ">";
}

bool Contact::operator==(const Contact c2) const
{
    return this->toString() == c2.toString();
};
