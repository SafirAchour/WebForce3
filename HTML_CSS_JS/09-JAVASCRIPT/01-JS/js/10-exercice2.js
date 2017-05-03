/* -- CONSIGNE : 

I. Créer un tableau 3D "PremierTrimestre" contenant la moyenne d'un étudiant pour plusieurs matières.

Nous aurons donc pour un étudiant, sa moyenne à plusieurs matières.

Par exemple : Hugo LIEGEARD : [Francais :12, Math: 19, Physique: 4], ... etc

Vous allez créez au minimum 5 étudiants.

II. Afficher sur la page (à l'aide de document.write) pour chaque étudiant, la liste (ul et li) de sa moyenne à chaque matière, puis sa moyenne générale.

--'*/

var PremierTrimestre  = [
    
    {
        "prenom"    : " HUGO ",
        "moyenne"   : {
            "Francais" : "12 ",
            "Math"     : "19 ",
            "Physique" : "4 "
        }
    },
    
    {
        "prenom"    : " TEVA ",
        "moyenne"   : {
            "Francais" : "15 ",
            "Math"     : "15 ",
            "Physique" : "13 "
        }
    },
    
    {
        "prenom"    : " CHARLES ",
        "moyenne"   : {
            "Francais" : "10 ",
            "Math"     : "17 ",
            "Physique" : "9 "
        }
    },
    
    {
        "prenom"    : " KARIM ",
        "moyenne"   : {
            "Francais" : "14 ",
            "Math"     : "18 ",
            "Physique" : "14 ",
        }
    
    },
    
    {
        "prenom"    : " NABILLA ",
        "moyenne"   : {
            "Francais" : "16 ",
            "Math"     : "13 ",
            "Physique" : "10 "
        }
    }
    
    
];

console.log(PremierTrimestre);

var NombreEleve = (PremierTrimestre.length);
console.log(NombreEleve);
document.write('<ol>')
for(i=0 ; i < NombreEleve ; i++){
    
    var etudiant = PremierTrimestre[i];
    
        document.write("Ici, i =  " + i);
        document.write(" Prénom :" + PremierTrimestre[i].prenom);
    
    document.write('<ul>')
    
    for(var matiere in etudiant.moyenne){
        NombreDeMatiere++;
        SommeDesNotes += Etudiant.moyenne[matiere];
        
        document.write('<li>')
        
            document.write(matiere + " : " + etudiant.moyenne[matiere]);
        
        document.write('</li>')  
    }  
    document.write('<li>')
        document.write(
    document.write('</li>')
    
    document.write('</ul>')  
    };
document.write('</ol>')




