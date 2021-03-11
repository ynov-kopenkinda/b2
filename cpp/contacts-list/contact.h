#ifndef CONTACT_H
#define CONTACT_H

#include "QString"

class Contact
{
    QString m_Name;
    QString m_Email;
public:
    Contact(QString name, QString email);
    QString toString();
};

#endif // CONTACT_H
