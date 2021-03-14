#include "contact.h"
#include <QDebug>

QString Contact::Name() const
{
    return m_Name;
}

QString Contact::Email() const
{
    return m_Email;
}

QString Contact::Phone() const
{
    return m_Phone;
}

QString Contact::Commentary() const
{
    return m_Commentary;
}

Contact::Contact(QString name, QString email, QString phone, QString commentary) {
    this->m_Name = name;
    this->m_Email = email;
    this->m_Commentary = commentary;
    this->m_Phone = phone;
}

void Contact::updateFields(QString name, QString email, QString phone, QString commentary)
{
    this->m_Name = name;
    this->m_Email = email;
    this->m_Commentary = commentary;
    this->m_Phone = phone;
}

QString Contact::toString() const
{
    return this->m_Name + " <" + this->m_Email + ">(" + this->m_Phone + ") [" + this->m_Commentary + "]";
}

QString Contact::serialize() const
{
    return this->m_Name+"|"+this->m_Email+"|"+this->m_Phone+"|"+this->m_Commentary;
}

bool Contact::operator==(const Contact c2) const
{
    return this->toString() == c2.toString();
}

bool Contact::matchesCriteria(QString criteria) const
{
    return (
                this->m_Name.contains(criteria) ||
                this->m_Commentary.contains(criteria) ||
                this->m_Email.contains(criteria) ||
                this->m_Phone.contains(criteria)
            );
};
