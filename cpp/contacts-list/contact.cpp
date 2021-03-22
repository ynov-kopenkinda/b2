#include "contact.h"
#include <QDebug>


Contact::Contact()
{}

Contact::Contact(const QString &name, const QString &surname, const QString &email, const QString &phone, const QString &commentary)
{
    this->setName(name);
    this->setSurname(surname);
    this->setEmail(email);
    this->setPhone(phone);
    this->setCommentary(commentary);
}

QString Contact::Name() const
{
    return m_Name;
}

QString Contact::Surname() const
{
    return m_Surname;
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

void Contact::setName(const QString &Name)
{
    m_Name = Name;
}


void Contact::setSurname(const QString &Surname)
{
    m_Surname = Surname;
}


void Contact::setEmail(const QString &Email)
{
    m_Email = Email;
}


void Contact::setPhone(const QString &Phone)
{
    m_Phone = Phone;
}


void Contact::setCommentary(const QString &Commentary)
{
    m_Commentary = Commentary;
}

bool Contact::isSame(Contact *toCompare)
{
    return this->m_Email == toCompare->Email() || this->m_Phone == toCompare->Phone();
}

bool Contact::matches(const QString &to)
{
    return (
                this->m_Name.contains(to, Qt::CaseSensitivity::CaseInsensitive) ||
                this->m_Surname.contains(to, Qt::CaseSensitivity::CaseInsensitive) ||
                this->m_Email.contains(to, Qt::CaseSensitivity::CaseInsensitive) ||
                this->m_Phone.contains(to, Qt::CaseSensitivity::CaseInsensitive) ||
                this->m_Commentary.contains(to, Qt::CaseSensitivity::CaseInsensitive)
                );
}

const QString Contact::toString()
{
    return this->m_Name + " " + this->m_Surname + " [" + this->m_Email + "]";
}

