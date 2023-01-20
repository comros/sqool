#include <iostream>

using namespace std;

class Ulamek
{
    private:
    int licznik, mianownik;

    public:
    Ulamek()
    {
        // Konstruktor ustawia domyślne wartości w przypadku nie ustawienia ich
        licznik = 0;
        mianownik = 1;
    }

    Ulamek(int l, int m)
    {
        // Przeładowanie konstruktora umożliwia ustawienie zmiennych przy stworzeniu obiektu
        licznik = l;
        if(m==0) mianownik = 1;
        else mianownik = m;
    }

    // Wypisuje ułamek dziesiętny
    double WartoscUlamka() { return (double)licznik/mianownik; }

    // Ustawia wartość licznika
    void UstawLicznik (int l) { licznik = l; }

    // Ustawia wartosć mianownika różną od 0
    void UstawMianownik (int m)
    {
        if(m == 0) mianownik = 1;
        else mianownik = m;
    }

    // Wypisuje ułamek zwykły
    void WypiszUlamek() { cout << licznik << "/" << mianownik; }

    // Wizualizuje równanie zamiany ułamka zwykłego na dziesiętny
    void Rownanie()
    {
        WypiszUlamek();
        cout << " = " << WartoscUlamka() << endl;
    }
};

int main()
{
    // Wywołanie klasy na 3 możliwe sposoby
    Ulamek uA;
    Ulamek uB(2,3);
    Ulamek uC;

    uC.UstawLicznik(5);
    uC.UstawMianownik(2);

    uA.Rownanie();
    uB.Rownanie();
    uC.Rownanie();

    return 0;
}
