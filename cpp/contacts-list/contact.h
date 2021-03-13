#ifndef CONTACT_H
#define CONTACT_H

#include "QString"

class Contact
{
    QString m_Name;
    QString m_Email;
    QString m_Phone;
public:
    Contact(QString name, QString email);
    QString toString() const;
    bool operator==(const Contact c2) const;
};

#endif // CONTACT_H
