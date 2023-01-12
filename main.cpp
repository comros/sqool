#include <iostream>

using namespace std;

class CUlamek
{
    private:
    int licznik, mianownik;

    public:
    CUlamek()
    {
        licznik = 0;
        mianownik = 1;
    }

    CUlamek(int l, int m)
    {
        licznik = l;
        if(m==0) mianownik = 1;
        else mianownik = m;
    }

    double Wartosc() { return (double)licznik/mianownik; }

    void UstawLicznik (int l) { licznik = l; }

    void UstawMianownik (int m)
    {
        if(m == 0) mianownik = 1;
        else mianownik = m;
    }

    void Wypisz() { cout << licznik << "/" << mianownik << endl; }
};

int main()
{
    CUlamek A;
    CUlamek B(2,3);
    CUlamek C;

    C.UstawLicznik(5);
    C.UstawMianownik(2);

    cout << A.Wartosc() << " " << B.Wartosc() << " " << C.Wartosc() << endl;

    A.Wypisz();
    B.Wypisz();
    C.Wypisz();

    return 0;
}