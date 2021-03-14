#ifndef CONTACT_H
#define CONTACT_H

#include "QString"

class Contact
{
    QString m_Name;
    QString m_Email;
    QString m_Phone;
    QString m_Commentary;
public:
    Contact(QString name, QString email, QString phone, QString commentary);
    void updateFields(QString name, QString email, QString phone, QString commentary);
    QString toString() const;
    QString serialize() const;
    bool operator==(const Contact c2) const;
    bool matchesCriteria(QString criteria) const;
    QString Name() const;
    QString Email() const;
    QString Phone() const;
    QString Commentary() const;
    bool isSame(Contact* toCompare) const;
};

#endif // CONTACT_H
