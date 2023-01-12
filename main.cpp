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
        licznik = 1;
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
    cout << A.Wartosc() << " " << B.Wartosc() << endl;
    B.Wypisz();
    A.Wypisz();
    return 0;
}