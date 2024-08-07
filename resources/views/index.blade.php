@include('header')

<main>
    <img class="top__img" src="{{ asset('img/shadow.png.png') }}" alt="ombre" />

    <section class="main__content">
        <img class="main__content-img1 site__img" src="{{ asset('img/detective window-sm.webp') }}" alt="enqueteur" />
        <img class="main__content-img1--lg" src="{{ asset('img/detective window.png') }}" alt="enqueteur" />
        <div class="box-content main__content-txt box__style">
            <h1 class="main__content-ttl">
                Bienvenue sur <span class="txt__red">Geo</span><span class="txt__blue">Caen</span>
            </h1>
            <h3 class="main__content-ttl">Explorez les merveilles de Caen :</h3>
            <p>
                Armé de votre smartphone ou votre tablette, naviguez dans les rues sinueuses et les ruelles pittoresques de Caen tout en découvrant les joyaux cachés ainsi que des monuments emblématiques datant de l'époque médiévale. Du majestueux château de Caen aux superbes Abbaye aux Hommes et Abbaye aux Dames, chaque lieu recèle de secrets à découvrir.
            </p>
        </div>
        <a class="link" href="{{ route('game') }}"><button class="btn">jouer ici !</button></a>
        <img class="main__content-img2 site__img" src="{{ asset('img/femme_window-sm.webp') }}" alt="enqueteur" />
        <img class="main__content-img2--lg" src="{{ asset('img/femme_window.png') }}" alt="enqueteur" />
        <div class="box-content main__content-txt box__style">
            <h3 class="main__content-ttl">
                Résolvez des mystères <span class="txt__red">historiques</span> :
            </h3>
            <p>
                Mettez vos talents de détective à l'épreuve en résolvant des mystères vieux de plusieurs siècles et en démêlant des énigmes historiques disséminées dans la ville. Suivez des indices, déchiffrez des messages énigmatiques et percez les secrets du passé de Caen pour découvrir des trésors et des artefacts cachés
            </p>
            <br />
            <h3 class="main__content-ttl">
                Relevez des défis <span class="txt__red">interactifs</span> :
            </h3>
            <p class="main__content-txt">
                Relevez une série de défis et de quêtes interactifs qui mettront à l'épreuve vos connaissances sur l'histoire et la culture de Caen. Des chasses au trésor aux quiz en passant par les défis photo et les missions temporelles, il y en a pour tous les goûts.
            </p>
            <br />
            <h3 class="main__content-ttl">
                Vivez des expériences <span class="txt__red">culturelles</span> :
            </h3>
            <p class="main__content-txt">
                Plongez-vous dans la tapisserie culturelle vibrante de Caen en participant à une variété d'expériences immersives, notamment des spectacles de musique traditionnelle, des ateliers d'artisans et des aventures culinaires mettant en vedette des spécialités locales et des délices gastronomiques.
            </p>
            <img class="main__content-img3 site__img" src="{{ asset('img/filette-sm.webp') }}" alt="fillette" />
        </div>

        <a class="link" href="{{ route('game') }}"><button class="btn">jouer ici !</button></a> 
    </section>
    <ul class="img__container">
        <li><img class="img__itm" src="{{ asset('img/caen image.jpg') }}" alt="" /></li>
        <li><img class="img__itm" src="{{ asset('img/map.png') }}" alt="" /></li>
        <li><img class="img__itm" src="{{ asset('img/abbaye.jpg') }}" alt="" /></li>
    </ul>

    <img class="main__content-img4 site__img" src="{{ asset('img/boy-sm.webp') }}" alt="garçon" />

    <section class="box-content box__style">
        <p>SLIDER TEMOIGNAGE UTILISATEURS</p>
    </section>

    <section class="news">
        <div class="news__content">
            <h2 class="news__content-ttl">
                <span class="txt__blue">News</span> du pays
                <span class="txt__red">Normand</span>
            </h2>
            <img class="main__content-img9" src="{{ asset('img/livreur-de-journaux-sm.webp') }}" alt="livreur de journaux" />
        </div>
        <div class="box-content box__style">
            <img class="news-img" src="{{ asset('img/memorial-britannique-ver-sur-mer.webp') }}" alt="" />
            <p>
                80e <span class="txt__blue">D</span>-<span class="txt__red">Day</span>. La cérémonie binationale franco-britannique se tiendra le 6 juin 2024 à 10 h 30.
            </p>
            <br />
            <p>
                Après la cérémonie internationale en 2023, le <span class="txt__blue">Mémorial</span> britannique de Ver-sur-Mer accueillera la cérémonie binationale franco-britannique le <span class="txt__red"> 6 juin 2024</span>.<br />Source : MARC OLLIVIER/ARCHIVES OUEST-FRANCE
            </p>
        </div>

        <div class="box-content box__style">
            <img class="news-img" src="{{ asset('img/millenaire caen.webp') }}" alt="" />
            <p>
                <span class="txt__blue">Millénaire</span> de <span class="txt__red">caen</span> : Une parade titanesque se prépare dans le plus grand secret.
            </p>
            <br />
            <p>
                En <span class="txt__blue">2025</span> le Millénaire de <span class="txt__red">Caen</span> se prépare, avec un événement phare la "parade opératique".
            </p>
        </div>
        <img class="main__content-img5 site__img" src="{{ asset('img/ombre detective-sm.webp') }}" alt="detective" />
    </section>
</main>

@include('footer') 
