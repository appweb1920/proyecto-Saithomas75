<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;
use App\Posts\Models\Comment;
use App\Posts\Models\Gender;
use App\Posts\Models\Post;
use Illuminate\Support\Facades\Hash;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario Administrador
        $useradmin = User::where('email', 'admin@admin.com')->first();
        if(!$useradmin){
            $useradmin = User::create([
                'name'      =>  'admin',
                'email'     =>  'admin@admin.com',
                'password'  =>  Hash::make('admin')
            ]);
        }

        //Rol
        $roladmin = Role::where('name', 'admin')->first();
        if(!$roladmin){
            $roladmin = Role::create([
                'name'      =>  'Administrador',
                'slug'     =>  'admin',
                'description'  =>  'Administrador',
                'full-access' => 'yes'
            ]);
        }

        $useradmin->roles()->sync([$roladmin->id]);

        $roluser = Role::create([
            'name'      =>  'Registered User',
            'slug'     =>  'registereduser',
            'description'  =>  'Registered User',
            'full-access' => 'no'
        ]);

        //Permisos de los roles
        $permission = Permission::create([
            'name'          => 'List Role',
            'slug'          => 'role.index',
            'description'   => 'A user can list role'
        ]);

        $permission = Permission::create([
            'name'          => 'Show Role',
            'slug'          => 'role.show',
            'description'   => 'A user can see role'
        ]);

        $permission = Permission::create([
            'name'          => 'Create Role',
            'slug'          => 'role.create',
            'description'   => 'A user can create role'
        ]);

        $permission = Permission::create([
            'name'          => 'Edit Role',
            'slug'          => 'role.edit',
            'description'   => 'A user can edit role'
        ]);

        $permission = Permission::create([
            'name'          => 'Destroy Role',
            'slug'          => 'role.destroy',
            'description'   => 'A user can destroy role'
        ]);

        //Permisos de usuario
        $permission = Permission::create([
            'name'          => 'List user',
            'slug'          => 'user.index',
            'description'   => 'A user can list user'
        ]);

        $permission = Permission::create([
            'name'          => 'Show user',
            'slug'          => 'user.show',
            'description'   => 'A user can see user'
        ]);

        $permission = Permission::create([
            'name'          => 'Create user',
            'slug'          => 'user.create',
            'description'   => 'A user can create user'
        ]);

        $permission = Permission::create([
            'name'          => 'Edit user',
            'slug'          => 'user.edit',
            'description'   => 'A user can edit user'
        ]);

        $permission = Permission::create([
            'name'          => 'Destroy user',
            'slug'          => 'user.destroy',
            'description'   => 'A user can destroy user'
        ]);

        $permission = Permission::create([
            'name'          => 'Show own user',
            'slug'          => 'userown.show',
            'description'   => 'A user can see own user'
        ]);

        $permission = Permission::create([
            'name'          => 'Edit own user',
            'slug'          => 'userown.edit',
            'description'   => 'A user can edit own user'
        ]);

        $roluser->permissions()->sync([11, 12]);

        //Users
        $user = User::create([
            'name'      =>  'Edgar Sánchez',
            'email'     =>  'edgar@gmail.com',
            'password'  =>  Hash::make('12345678')
        ]);

        $user->roles()->sync([$roluser->id]);

        $user = User::create([
            'name'      =>  'Ruben Blades',
            'email'     =>  'ruben@gmail.com',
            'password'  =>  Hash::make('12345678')
        ]);

        $user->roles()->sync([$roluser->id]);

        $user = User::create([
            'name'      =>  'Benito Martinez',
            'email'     =>  'benito@gmail.com',
            'password'  =>  Hash::make('12345678')
        ]);

        $user->roles()->sync([$roluser->id]);

        $user = User::create([
            'name'      =>  'David Bowie',
            'email'     =>  'david@gmail.com',
            'password'  =>  Hash::make('12345678')
        ]);

        $user->roles()->sync([$roluser->id]);

        $user = User::create([
            'name'      =>  'Robert Niro',
            'email'     =>  'robert@gmail.com',
            'password'  =>  Hash::make('12345678')
        ]);

        $user->roles()->sync([$roluser->id]);

        //Generos
        $gender = Gender::create([
            'name'  => 'Epic'
        ]);

        $gender = Gender::create([
            'name'  => 'Story'
        ]);

        $gender = Gender::create([
            'name'  => 'Novel'
        ]);

        $gender = Gender::create([
            'name'  => 'Fable'
        ]);

        $gender = Gender::create([
            'name'  => 'Song'
        ]);

        $gender = Gender::create([
            'name'  => 'Anthem'
        ]);

        $gender = Gender::create([
            'name'  => 'Satire'
        ]);

        $gender = Gender::create([
            'name'  => 'Romance'
        ]);

        $gender = Gender::create([
            'name'  => 'Sonnet'
        ]);

        $gender = Gender::create([
            'name'  => 'Tragedy'
        ]);

        $gender = Gender::create([
            'name'  => 'Melodrama'
        ]);

        $gender = Gender::create([
            'name'  => 'Comedy'
        ]);

        $gender = Gender::create([
            'name'  => 'Tragicomedy'
        ]);

        $gender = Gender::create([
            'name'  => 'Essay'
        ]);

        $gender = Gender::create([
            'name'  => 'Biography'
        ]);

        $gender = Gender::create([
            'name'  => 'Chronicle'
        ]);

        //Posts
        $posts = Post::create([
            'title'     => 'Cruisin',
            'written'   => '<p>No puedo decir cu&aacute;ndo fue la primera vez que escuch&eacute; una canci&oacute;n de Chalino S&aacute;nchez. Digamos, por conveniencia, que ocurri&oacute; en el mercado donde acostumbraba a comer con mi abuelo. Al fondo de un peque&ntilde;o local, sobre un refrigerador verde y cuadrado, la televisi&oacute;n celebra un rostro joven y una pistola al cinto. Lo recuerdo as&iacute;: la mano derecha sosteniendo un micr&oacute;fono, sobre un escenario, acompa&ntilde;ado de tres o cuatro m&uacute;sicos con quienes intercambia miradas. Luego, el sudor y el brillo y contraste de una grabaci&oacute;n del siglo pasado, una espesa franja de salitre reptando por debajo de la tejana hasta alcanzar la nariz. Mientras canta, a ratos, utiliza la manga izquierda para limpiarse el rostro.</p>

            <p>No puedo decir cu&aacute;ndo fue la primera vez que escuch&eacute; a Chalino, sin embargo, s&iacute; puedo, al menos, intuir que debi&oacute; ser en los 2000, cuando por razones ligadas a mi fecha de nacimiento, la radio, la tele y los discos de tianguis eran responsables de mi formaci&oacute;n intelectual.</p>

            <p>Un recuerdo de este tipo, para mucha gente, podr&iacute;a quedar en lo anecd&oacute;tico solo porque ignora la manera c&oacute;mo el descubrimiento de algo marca la relaci&oacute;n con ese algo. No culpo a nadie, ni yo lo entiendo del todo. Sostengo, personalmente, la existencia de un antes y un despu&eacute;s al escuchar La Canci&oacute;n; en mi caso, fue el punk, el rock urbano, algunos sonideros, el bafle en mochila, los que marcaron mi experiencia como adolescente creciendo en el Edo. Mex. de finales del s. XX.</p>

            <p>Como era de esperarse, ni mis amigos ni yo &eacute;ramos los &uacute;nicos en vagar por colonia. Hab&iacute;a de todo, y hab&iacute;a m&uacute;sica para todos. Hab&iacute;a tanto que no exist&iacute;a necesidad de elegir y cualquiera pod&iacute;a rechazar todo a diestra y siniestra: al emo por flecudo, a Big Metra por dejar la VG y hacer reggaet&oacute;n, o a los rucos jipis de los discos por jipis, o los skins porque s&iacute;, o al reggaet&oacute;n por reggaet&oacute;n. Yo mismo, en alg&uacute;n momento, le entre al tema. &iquest;Qu&eacute; ten&iacute;a que ver el punk con buscar pleito en los perreos en las canchas bajo el puente a un lado del Clandestino de Avenida Central? No s&eacute;. Incluso a trav&eacute;s de una pregunta ret&oacute;rica la cuesti&oacute;n me parece rid&iacute;cula.</p>

            <p>Pese a todo, no me arrepiento ni me justifico. La m&uacute;sica es un gusto adquirido.</p>

            <p>Lo cual me lleva a preguntar, &iquest;en qu&eacute; consiste la idea del gusto culposo, del placer reprochable?</p>

            <p>He pasado los &uacute;ltimos dos meses buscando el video de la escena que dije recordar.</p>

            <p>Pregunto aqu&iacute; y all&aacute;. Asumo que internet es tan listo para completar los vac&iacute;os de mi b&uacute;squeda. Tecleo:&nbsp;<em>chalino fiesta</em>;&nbsp;<em>chalino fiesta de cholos</em>;&nbsp;<em>chalino baile cholos coachela</em>, etc. Insisto en la b&uacute;squeda. Puedo asegurar lo siguiente: viste saco rojo, camisa negra y tejana de un tono entre el hueso y el blanco sucio. Al fondo hay gente bebiendo, parejas bailando. No dir&iacute;a que se trata de un concierto, sino de un baile. Quiz&aacute; una fiesta. Debi&oacute; ocurrir en alg&uacute;n lugar de la frontera entre M&eacute;xico y Estados Unidos antes de 1992.</p>

            <p>De la vida de Rosalino S&aacute;nchez F&eacute;lix se sabe poco, y de lo que se sabe, se sabe poco. O quiz&aacute; no haya necesidad de saber m&aacute;s. En 1977 llega a Los &Aacute;ngeles, California, para vivir con su t&iacute;a, huyendo de la gente brav&iacute;a y los ajustes de cuentas ligados al hacerse justicia por mano propia. Durante el mismo a&ntilde;o, a los pocos meses, &eacute;l y Armando, uno de sus seis hermanos, comienzan a trabajar de polleros.</p>

            <p>&iquest;En qu&eacute; consiste la idea del gusto culposo, del placer reprochable?</p>

            <p><em>Desde el punto de vista de la &Eacute;tica, los deseos y los actos son buenos o malos y elegimos lo bueno y rechazamos lo malo. Esto significa que tener un sentido del pecado implica sentir culpa porque hay una elecci&oacute;n &eacute;tica por hacer, culpa que no importa cu&aacute;n bueno me vuelva, no cambia.</em></p>

            <p>Al final, eso no resuelve nada.</p>

            <p><em>Si no hubiera conocido ley, no hubiera conocido culpa</em>, dice Auden.</p>

            <p>Hacia finales de los 70 el movimiento chicano ya cargaba veinte a&ntilde;os de lucha por el reconocimiento de los derechos civiles y la erradicaci&oacute;n de los estereotipos negativos acerca de la comunidad hispana. Sin embargo, en un plano paralelo, o seguramente anterior, la cultura heredada por los colonos de los antiguos territorios del norte de M&eacute;xico, sumada a la propia de los nuevos migrantes, hab&iacute;a echado ra&iacute;ces profundas; con esto no solo me refiero a la apropiaci&oacute;n de ciertos elementos de la cultura afroamericana y occidental, sino aquello que Lalo Guerrero describe mejor: &ldquo;ya que el destino me puso tan lejos de M&eacute;xico, canto a esta tierra/ Los &Aacute;ngeles, que es la capital del M&eacute;xico de afuera&rdquo;.</p>

            <p>Cada quien canta desde su propio pico.</p>

            <p>En el 84 Armando es asesinado en el hotel Santa Rita de Tijuana. Para Chalino, la muerte de su hermano fue, tambi&eacute;n, el comienzo de su carrera como cantautor de corridos. Para muchos migrantes e hijos de migrantes, Chalino signific&oacute; tanto el reencuentro con la vida del otro lado de la frontera, como el primer encuentro con la vida que nunca se conoci&oacute;. De cualquier forma, aun siendo terriblemente popular, &ldquo;Nieves de enero&rdquo; no tuvo lugar en los aparadores donde se ubica el gusto refinado. Al contrario, el salto sucedi&oacute; de los recitales clandestinos, a las canciones pagadas por&nbsp;<em>toughs</em>&nbsp;locales, a las peticiones en la radio, a los &eacute;xitos de ventas en autolavados, tiendas de paso, puestos en la calle.</p>

            <p><em>Yo no canto, yo ladro</em>, dicen que dec&iacute;a Chalino.</p>

            <p>Si me esfuerzo un poco m&aacute;s, afirmo que el video se presta para los remixes. Una caja de ritmos. A lo mejor el&nbsp;<em>dembow</em>&nbsp;no va. Por decir algo, &ldquo;Cruisin&rsquo; X Chalino ft Lil Rob&rdquo;, &ldquo;Alma enamorada&nbsp;<em>chopped &amp; screwed&rdquo;</em>. Y no es dif&iacute;cil, las preguntas adecuadas dan las respuestas adecuadas, casi de inmediato encuentro una lista de reproducci&oacute;n llena de este tipo de joyitas.</p>',
            'review'    => '<p>No puedo decir cu&aacute;ndo fue la primera vez que escuch&eacute; una canci&oacute;n de Chalino S&aacute;nchez. Digamos, por conveniencia, que ocurri&oacute; en el mercado donde acostumbraba a comer con mi abuelo.</p>',
            'visibility' => 'public',
            'image'     => 'http://proyecto.test/images/qNFUckRFfE8ZjuzNnoedrKA4Ho4H2ieNw3YWzXiP.jpeg',
            'user_id'   => '1',
            'gender_id' => '14'
        ]);

        $posts = Post::create([
            'title'     => 'Yo la adoro a Jane Austen',
            'written'   => '<p>Bienvenida a la casa de las citas. Esta semana la Redacci&oacute;n de Tierra Adentro amaneci&oacute; (y amanece, al menos hasta hoy) y se fue a la cama con un pendiente perpetuo: hallar el origen de&nbsp;<em>esa</em>&nbsp;frase que no se le iba de la cabeza, y tan no se le fue que termin&oacute; convertida en el t&iacute;tulo de esta publicaci&oacute;n. La Redacci&oacute;n de Tierra Adentro sab&iacute;a de antemano que: a) Era una cita de C&eacute;sar Aira y b) Pertenec&iacute;a a una entrevista.</p>

            <p>Primer error: la Redacci&oacute;n de Tierra Adentro recordaba mal la frase. En lugar del cari&ntilde;oso t&iacute;tulo que encabeza esta publicaci&oacute;n, la Redacci&oacute;n de Tierra Adentro busc&oacute; en DuckDuckGo &ldquo;yo adoro a la Jane Austen&rdquo;, y as&iacute;, entrecomillado, lo &uacute;nico que arroja el buscador es un eco de cero entradas y desmemoria.</p>

            <p>Segundo error, este de los recolectores de la frase: mientras que hab&iacute;an titulado la p&aacute;gina &ldquo;Yo la adoro a Jane Austen&rdquo;, en realidad el t&iacute;tulo de la entrevista es&nbsp;<a href="http://www.lehman.cuny.edu/ciberletras/v15/epplin.html"><strong>Cualquier cosa: un encuentro con C&eacute;sar Aira</strong></a>, de Craig Epplin (University of Pennsylvania) y Phillip Penix-Tadsen (Columbia University).</p>

            <p>Tercer error: la frase en cuesti&oacute;n no aparece en el cuerpo de la entrevista. Y no es algo que se descubra al final de una lectura gozosa o m&aacute;s o menos gozosa (no en las circunstancias de la Redacci&oacute;n de Tierra Adentro) sino&nbsp;⌘ + F y resulta que la &uacute;nica menci&oacute;n de Jane Austen en el cuerpo del texto es esta: &ldquo;traduje a Jane Austen, y alg&uacute;n autor franc&eacute;s, o ingl&eacute;s&rdquo; y ya.</p>

            <p>Entonces una (la Redacci&oacute;n de Tierra Adentro, pero lo mismo cualquier otro) empieza a preguntarse si la cita es verdaderamente de C&eacute;sar Aira. Porque lo mismo podr&iacute;a ser una exclamaci&oacute;n de Epplin o Penix-Tadsen. O de una tercera persona, el primer copista a digital. O una editora. U otra Redacci&oacute;n. Insondable.</p>

            <p>Y todo eso viene al caso porque la Redacci&oacute;n de Tierra Adentro tambi&eacute;n adora a la Jane Austen y es medio mani&aacute;tica de los cumplea&ntilde;os y las citas citables. Y el asunto de la cita que sigue sin atribuci&oacute;n la oblig&oacute; celebrar hasta hoy, con dos d&iacute;as de retraso, el cumplea&ntilde;os 206 de&nbsp;<em>Pride and prejudice</em>&nbsp;de la Jane Austen.</p>

            <p>Antes de pasar a a la traducci&oacute;n del primer cap&iacute;tulo de la novela cumplea&ntilde;era (a cargo de Isabel del Valle), a la Redacci&oacute;n de Tierra Adentro le gustar&iacute;a dar dos instrucciones para el disfrute pleno de esta y las dem&aacute;s novelas de la Jane Austen:</p>

            <p>1) Jam&aacute;s veas las pel&iacute;culas basadas en las novelas de la Jane Austen. Basta con el tr&aacute;iler para descubrir el enga&ntilde;o de esos prados. Las novelas de la Jane Austen son otra cosa, son (si es que tienen que ser&nbsp;<em>algo</em>) la elevaci&oacute;n de la casamentera a mente maestra, analista, hermeneuta de las fiestas y tejedora de todos los hilos.</p>

            <p>2) La prueba de la importancia de las novelas de la Jane Austen est&aacute; en la legi&oacute;n de lectoras j&oacute;venes que convoca. La &uacute;nica esperanza que vale es la que se pone en las lectoras j&oacute;venes.</p>

            <p>&nbsp;</p>

            <h1><strong>Orgullo y prejuicio</strong></h1>

            <h1><strong>Cap&iacute;tulo 1</strong></h1>

            <p>Es una verdad universalmente reconocida que un hombre soltero en posesi&oacute;n de una buena fortuna debe estar en necesidad de una esposa.</p>

            <p>Sin importar que las ideas de un hombre as&iacute; sean poco conocidas al establecerse este en un vecindario nuevo, esa verdad se encuentra tan bien fijada en las mentes de las familias que lo rodean que es considerado, desde su llegada, la propiedad leg&iacute;tima de una u otra de sus hijas.</p>

            <p>&mdash;Mi querido se&ntilde;or Bennet &mdash;le dijo su mujer un d&iacute;a&mdash;, &iquest;has escuchado que Netherfield Park ha sido finalmente ocupada?</p>

            <p>El se&ntilde;or Bennet respondi&oacute; que no lo hab&iacute;a escuchado.</p>

            <p>&mdash;Pues lo est&aacute; &mdash;replic&oacute; ella&mdash;; la se&ntilde;ora Long acaba de estar aqu&iacute; y me lo ha contado todo.</p>

            <p>El se&ntilde;or Bennet no respondi&oacute;.</p>

            <p>&mdash;&iquest;No quieres saber qui&eacute;n la ha ocupado? &mdash;chill&oacute; su esposa con impaciencia.</p>

            <p>&mdash;T&uacute; quieres cont&aacute;rmelo, y no tengo objeci&oacute;n alguna en escucharte.</p>

            <p>Esto fue invitaci&oacute;n suficiente.</p>

            <p>&mdash;Muy bien, mi querido, debes saber que la se&ntilde;ora Long dice que Netherfield ha sido rentada por un hombre joven de enorme fortuna proveniente del norte de Inglaterra; vino el lunes en un carro de cuatro caballos a ver el lugar, y qued&oacute; tan complacido con &eacute;l que inmediatamente lleg&oacute; a un acuerdo con el se&ntilde;or Morris y se mudar&aacute; antes de la fiesta de San Miguel, pero algunos de sus sirvientes se instalar&aacute;n en la casa antes de que termine la pr&oacute;xima semana.</p>

            <p>&mdash;&iquest;Cu&aacute;l es su nombre?</p>

            <p>&mdash;Bingley.</p>

            <p>&mdash;&iquest;Es casado o soltero?</p>

            <p>&mdash;&iexcl;Oh! &iexcl;Soltero, querido, eso es seguro! Un hombre soltero de fortuna considerable; cuatro o cinco mil libras al a&ntilde;o. &iexcl;Qu&eacute; buena noticia para nuestras hijas!</p>

            <p>&mdash;&iquest;En serio? &iquest;C&oacute;mo puede esto afectarlas?</p>

            <p>&mdash;Mi querido se&ntilde;or Bennet &mdash;replic&oacute; su esposa&mdash;, &iquest;c&oacute;mo puedes ser tan fastidioso? Debes saber que estoy pensando en que se case con una de ellas.</p>

            <p>&mdash;&iquest;Ese es el motivo por el que ha decidido establecerse aqu&iacute;?</p>

            <p>&mdash;&iexcl;Su motivo! Tonter&iacute;as, &iquest;c&oacute;mo puedes decir eso? Pero es muy probable que se enamore de una de ellas, por lo que debes ir a visitarlo en cuanto llegue.</p>

            <p>&mdash;No veo raz&oacute;n para ello. T&uacute; y las muchachas pueden ir, o las puedes mandar solas, lo cual probablemente sea lo mejor, ya que eres tan hermosa como cualquiera de ellas y podr&iacute;as gustarle m&aacute;s al se&ntilde;or Bingley.</p>

            <p>&mdash;Querido, me halagas. Es verdad que fui bastante hermosa en mi juventud, pero no pretendo ser ahora nada extraordinario. Cuando una mujer tiene cinco hijas ya crecidas, en lo &uacute;ltimo que debe pensar es en su propia belleza.</p>

            <p>&mdash;En tales casos, a la mujer ya no le debe de quedar mucha belleza en la que pensar.</p>

            <p>&mdash;Bueno, querido, debes ir a ver al se&ntilde;or Bingley en cuanto venga al vecindario.</p>

            <p>&mdash;Es m&aacute;s de lo que puedo prometer, te lo aseguro.</p>

            <p>&mdash;Pero, piensa en tus hijas. Lo que significar&iacute;a para cualquiera de ellas un partido as&iacute;. Sir William y Lady Lucas est&aacute;n decididos a ir solamente por ese motivo, ya sabes que en general no visitan a los nuevos vecinos. Desde luego que debes ir, pues ser&aacute; imposible para nosotras visitarlo si t&uacute; no lo haces.</p>

            <p>&mdash;Eres demasiado escrupulosa, eso es seguro. Me atrevo a decir que al se&ntilde;or Bingley le gustar&aacute; mucho verte; le mandar&eacute; por medio de ti algunas l&iacute;neas para asegurarle mi consentimiento a su matrimonio con cualquiera de las chicas; aunque pondr&eacute; alguna palabra a favor de mi peque&ntilde;a Lizzy.</p>

            <p>&mdash;Por favor no hagas eso. Lizzy no es ni un poco mejor que las dem&aacute;s; y estoy segura de que no es ni la mitad de hermosa que Jane, ni la mitad de alegre que Lydia. Pero siempre la prefieres a ella.</p>',
            'review'    => '<p>Bienvenida a la casa de las citas. Esta semana la Redacci&oacute;n de Tierra Adentro amaneci&oacute; (y amanece, al menos hasta hoy).</p>',
            'visibility' => 'public',
            'image'     => 'http://proyecto.test/images/EZN1Y2WGGME9iusoJBT4N4BfpQsolHqbUtWS5Y1A.jpeg',
            'user_id'   => '1',
            'gender_id' => '3'
        ]);

        $posts = Post::create([
            'title'     => 'Desde el fondo del pozo',
            'written'   => '<p><strong>CAP&Iacute;TULO 1. EL OBSERVADOR DE LA LUNA</strong></p>

            <p>Cuando mi hermano lleg&oacute; al Cairo, hac&iacute;a mucho tiempo que no nos ve&iacute;amos. Est&aacute;bamos a punto de cumplir cuarenta a&ntilde;os, y desde hac&iacute;a poco m&aacute;s de la mitad de ese tiempo no nos habl&aacute;bamos. Ni una palabra, ni una llamada en todos esos a&ntilde;os, s&oacute;lo la postal que yo le hab&iacute;a enviado hac&iacute;a tres meses para pedirle que se encontrara conmigo en Egipto. De un lado, la imagen de Elizabeth Taylor con el vestuario puesto mientras filmaba Cleopatra. Del otro, la direcci&oacute;n y una constataci&oacute;n:</p>

            <blockquote>
            <p>William,<br />
            creo que al fn me acord&eacute; de todo.<br />
            Con amor,</p>

            <p>xxx<br />
            P.D. Ven con urgencia a reunirte conmigo&ndash; Odeon Palace Hotel, calle Abdel Hamid Said, No. 6, El Cairo, Egipto.</p>
            </blockquote>

            <p>No sab&iacute;a a ciencia cierta si la tarjeta llegar&iacute;a a su destinatario, aunque pod&iacute;a imaginarlo viviendo a&uacute;n en el departamento donde pasamos la infancia. La inicial que frmaba el mensaje estaba tachada: la urgencia hab&iacute;a sido tanta, que ni siquiera tuve tiempo de decidir qu&eacute; nombre usar. Eso no har&iacute;a ninguna diferencia, pues, independientemente del nombre elegido, ya ser&iacute;a demasiado tarde para el rescate o la redenci&oacute;n. Al llegar a El Cairo, mi hermano no encontrar&iacute;a a nadie, era f&aacute;cil adivinarlo. Mi esperanza era que, al no encontrarme, por extra&ntilde;as v&iacute;as se encontrara a s&iacute; mismo. No obstante, al contrario de lo que dicen, hay cosas que no mueren sino hasta que desaparece la &uacute;ltima esperanza. Y no signifcar&iacute;a mucho que, al recibir la postal, mi hermano balbuceara el nombre por el que me conoci&oacute;. O que, al ver la foto de Liz Taylor, murmurara s&oacute;lo para s&iacute; mismo el nombre que a &eacute;l le resultaba desconocido al leer el mensaje, pero que yo adopt&eacute; cuando nac&iacute; de nuevo, m&aacute;s o menos un a&ntilde;o despu&eacute;s de la noche en que nos vimos por &uacute;ltima vez. Ninguno de esos soplos me devolver&iacute;a la vida o me restituir&iacute;a mi lugar original en el mundo. Ya no hab&iacute;a esperanza, al menos para m&iacute;. Mi nave espacial se hab&iacute;a estrellado contra la Luna. No hab&iacute;a fundado una ciudad y, as&iacute;, hab&iacute;a relegado mi destino a la &uacute;nica alternativa posible: la muerte. Todo hab&iacute;a desaparecido. Yo ya no era casi nada, era menos que un &aacute;rbol o que una roca. Me faltaba poco para no ser nadie.</p>

            <p>Me faltaba William.</p>

            <p>Como yo, mi hermano aterriz&oacute; por la madrugada en el Aeropuerto Internacional del Cairo, en el avi&oacute;n de klm que lleva a bordo mochileros europeos, aprendices de terrorista y gente de todas partes, lo suficientemente obstinada como para hacer frente a la horda nocturna de taxistas que infesta ese vest&iacute;bulo cuyo aspecto arenoso se debe al desierto que se filtra por todas las rendijas, casi enterr&aacute;ndolo. Es gente que no tiene nada que perder, como nosotros dos. Algunas de las personas m&aacute;s miserables del Universo se encuentran siempre en ese aeropuerto, a la mitad de la noche. Aunque en la fila de migraci&oacute;n el cansancio de los rostros a veces se confunde con alguna expectativa ante la suerte, esa gente no lleva m&aacute;s que desesperaci&oacute;n en las maletas. Ning&uacute;n empleado de la aduana pareci&oacute; darse cuenta de que William estaba borracho.</p>

            <p>Despu&eacute;s de perseguir su equipaje, que los taxistas del &aacute;rea de llegadas secuestraban hacia el estacionamiento, y perseguirlo de regreso hasta el vest&iacute;bulo dos o tres veces, William solt&oacute; algunos gru&ntilde;idos en su lenguaje alcoh&oacute;lico y le hizo gestos al egipcio m&aacute;s cercano. La mara&ntilde;a de manos por fin solt&oacute; sus maletas y a los choferes derrotados no les qued&oacute; otra salida que resignarse ante la p&eacute;rdida definitiva del pasajero. De todas formas se quedaron discutiendo a gritos en &aacute;rabe, mientras el vencedor le exhib&iacute;a al cliente reci&eacute;n conquistado las piezas faltantes de su dentadura, agujeros que parec&iacute;an peque&ntilde;as gemas negras incrustadas en su boca, de una oscuridad id&eacute;ntica a la de los restos de la noche sobre el estacionamiento all&aacute; afuera. Entonces caminaron hacia el coche que, al igual que su due&ntilde;o, tambi&eacute;n se ca&iacute;a a pedazos.</p>

            <p>En la carretera, el d&iacute;a empezaba lentamente a subyugar la noche, haciendo surgir a distancia una neblina difusa que confund&iacute;a los l&iacute;mites entre el cielo y la tierra. Al entrar en la ciudad, las&nbsp;&nbsp;&nbsp;siluetas opresoras de las mezquitas se recortaban veloces contra la claridad de la ma&ntilde;ana ascendente y el asfalto azulado empez&oacute; su tarea diaria de absorber calor, sudor humano y heces de las bestias de carga. Ante las panader&iacute;as de las esquinas, al desfle de muchachos con canastas de mimbre listas para llenarse le faltaba una orquestaci&oacute;n un poco m&aacute;s arm&oacute;nica, hasta que el olor del pan por fin asalt&oacute; el aire y todos desaparecieron, tragados por el humo del&nbsp;<em>aish&nbsp;</em>horneado. Y la manada de autom&oacute;viles que fre&iacute;an aceite por fin sali&oacute; disparada hacia el d&iacute;a de hoy.</p>',
            'review'    => '<p><strong><em>En este fragmento in&eacute;dito de la novela del escritor brasile&ntilde;o Joca Reiners Terron, a quien los lectores mexicanos conocieron con&nbsp;</em>La tristeza extraordinaria del leopardo de las nieves<em>, dos hermanos se citan en El Cairo para un ajuste de cuentas.</em></strong></p>',
            'visibility' => 'public',
            'image'     => 'http://proyecto.test/images/pCraiuMPbZNBBIKWt4mOCRdtKWcneDqX5y3yaM27.jpeg',
            'user_id'   => '1',
            'gender_id' => '11'
        ]);

        $posts = Post::create([
            'title'     => 'La ciudad del olvido',
            'written'   => '<p>Diego Ikal Peralta tiene dos semanas en el camino seguro hacia una cirrosis cr&iacute;tica, a una aguda depresi&oacute;n, o a un episodio psic&oacute;tico severo.</p>

            <p>Lleva d&iacute;as intentando alejarse de las memorias que lo mantienen despierto en las madrugadas, hasta terminar con la botella de Appleton a&ntilde;ejo, licor que no logra suplir el Ativan, el Tafil, las inhalaciones de coca&iacute;na y toda una gama de nuevas drogas. Toda la variedad de estupefacientes que necesita alguien con tantas im&aacute;genes incrustadas en los ojos y en el olfato.</p>

            <p>Es Mar&iacute;a Jos&eacute; quien va tras &eacute;l todas las noches. Su esposa, que hace semanas falleci&oacute;. &laquo;La mataron&raquo;, se dice. A diario, cuando Ikal cae en la cama, su mujer llega desde el r&iacute;o con el abrigo puesto, las piedras hundi&eacute;ndola y su hijo nonato en el vientre. &laquo;La mataron&raquo;, se repite.</p>

            <p>Y lo sostendr&aacute; aunque el resto del mundo diga lo contrario. Aunque el expediente del Ministerio P&uacute;blico subraye frases como &laquo;Se presume que cometi&oacute; el acto de suicidio&raquo;. La primera vez que lo ley&oacute; casi escupe en la cara del ministerial. Suicidio. La palabra retumba en su memoria. No. No lo hizo. Ikal sabe que Mar&iacute;a Jos&eacute; ser&iacute;a incapaz. Ya hab&iacute;a dejado la adicci&oacute;n a las Experiencias V&iacute;vidas.</p>

            <p>Hace dos semanas, ella asisti&oacute; a unas pruebas mercadol&oacute;gicas para el lanzamiento de la nueva droga de recreaci&oacute;n que est&aacute; produciendo Dreamhost. &laquo;Ah&iacute; nos chingaron, mi amor&raquo;. Ese d&iacute;a tuvo una noche de tormenta, identificaron diez cuerpos que arrastr&oacute; el r&iacute;o, uno de ellos era Mar&iacute;a Jos&eacute;.</p>

            <p>Ahora Diego Ikal se encuentra en La Divina, un bar del centro de la ciudad. Es tarde. Lo sabe porque la sed es tan letal que s&oacute;lo se puede quemar con alcohol. Revisa la bolsa de su pantal&oacute;n y empu&ntilde;a la Ruger LCR.22 de ocho tiros; a&uacute;n le parece un arma femenina, pero, con la premura, fue lo que pudo encontrar.</p>

            <p>Est&aacute; instalado en el lugar m&aacute;s oscuro, en la esquina perfecta para ver qui&eacute;n entra y qui&eacute;n sale. Toca la pared y rasca el yeso con las u&ntilde;as, lo lleva a la boca y saborea, la sensaci&oacute;n terrosa en la lengua lo reconforta.</p>

            <p>La Divina es de una planta: al entrar, la barra se encuentra en el lado derecho; a la izquierda y al fondo hay m&aacute;s de veinte mesas distribuidas con orden, todas con comensales que ya van en la cuarta, quinta, sexta ronda de la noche. &laquo;No deben tardar&raquo;. Ruega que sea suficiente alcohol para borrar los recuerdos. No est&aacute; seguro y ordena otro Appleton al mesero, quien trae un caldo de lentejas como aperitivo. Recorre de nuevo el bar con la vista, buscando alguna sombra conocida, algo que lo alerte, y entonces atacar, eliminarlo, descargar la frustraci&oacute;n que lo tiene nadando en este lodo f&eacute;tido de a&ntilde;oranzas.</p>

            <p>Piensa en Dreamhost. Saca su celular, accede a la carpeta de im&aacute;genes y selecciona una titulada Pendientes; as&iacute; la llam&oacute; desde el d&iacute;a en que decidi&oacute; lanzarse a la cruzada para aniquilar a los responsables de la muerte de su esposa y de su hijo nonato. Adentro hay una serie de fotos, se detiene en tres: en una de ellas aparece el director de Salud P&uacute;blica, un tipo moreno, gordo y detestable; en otra aparece un se&ntilde;or con bata blanca, serio, de barba y cabello gris, &laquo;Sebasti&aacute;n Terreros&raquo;, piensa; en la tercera hay un tipo con rostro de rata obesa, &laquo;Jacint Casals&raquo;, se dice.</p>

            <p>No fue dif&iacute;cil saber en d&oacute;nde se encontrar&iacute;an: un par de llamadas, cobrar otros favores y listo. &laquo;All&iacute; se juntan los mi&eacute;rcoles, saliendo de la oficina, como a eso de las nueve&raquo;, le dijo la secretaria del director de Salud P&uacute;blica. Sin embargo, ya son casi las once de la noche y no han llegado. Bebe de nuevo cuando le traen el trago y pide otro caldo de lentejas para calmar la necesidad de raspar el yeso de la pared.</p>

            <p>&laquo;Hay que tener cuidado con las mujeres que se abandonan&raquo;, piensa mientras busca su cartera, saca un billete de quinientos y lo coloca en la bolsa contraria de donde guarda el arma.</p>

            <p>Luego de la muerte de su esposa inici&oacute; una investigaci&oacute;n sobre la nueva droga de dise&ntilde;o de Dreamhost, enfocado en los da&ntilde;os colaterales que pudiera ocasionar.</p>

            <p>Se trataba de una droga de calidad, de elite. Al parecer estaban haciendo pruebas con testers y ofrec&iacute;an cincuenta mil pesos a quienes pudieran pasar los ex&aacute;menes y lograran consumirla. Sin embargo, Ikal no sab&iacute;a ni a cu&aacute;ntos ni a qui&eacute;nes se aplicaba, tampoco sus efectos. Era algo mucho m&aacute;s fuerte que las Experiencias V&iacute;vidas, algo que se vender&iacute;a mucho m&aacute;s caro. Adem&aacute;s el corporativo en Barcelona hab&iacute;a delegado a un tal Jacint Casals. Algo se estaba cocinando.</p>

            <p>Esculc&oacute; en casa y de uno de los cajones de Mar&iacute;a Jos&eacute; rescat&oacute; un contrato de la compa&ntilde;&iacute;a, Art Viu: De lo Bello a lo Sublime, la nueva droga ya ten&iacute;a nombre.</p>

            <p>As&iacute; que fue a visitar al doctor Terreros: en la primera ocasi&oacute;n lo recibi&oacute; cordialmente, en la segunda lo dej&oacute; en la antesala, y a partir de la tercera no le permiti&oacute; entrar al edificio.</p>

            <p>Terreros acept&oacute; que se estaba llevando a cabo el desarrollo de una nueva droga, pero neg&oacute; por completo que se estuvieran reclutando donadores o testers y que, adem&aacute;s, algunos de ellos tuvieran efectos secundarios. Ikal busc&oacute; otros m&eacute;todos.</p>

            <p>Hac&iacute;a guardias por las noches. Comenz&oacute; a vigilar la basura de la farmac&eacute;utica. En una de sus exploraciones dentro de los contenedores encontr&oacute; una lista, estaba cortada en tiras y tard&oacute; un par de d&iacute;as en armarla y entender lo que dec&iacute;an los papeles. Nombres, direcciones, tel&eacute;fonos, correos, y una columna con la variable: P&eacute;rdida. Ah&iacute; se encontraba el nombre de Mar&iacute;a Jos&eacute;. &laquo;Mierda&raquo;, los huesos comenzaron a hac&eacute;rsele polvo del coraje. &laquo;Fueron ellos&raquo;, lo supo y encontr&oacute; la forma de verse de nuevo con Terreros.</p>

            <p>Hizo llamadas y visitas. Y s&iacute;, el com&uacute;n denominador era el suicidio. Comenz&oacute; a redactar la nota y sigui&oacute; uniendo los cabos sueltos. Ten&iacute;a que encontrar m&aacute;s informaci&oacute;n.</p>

            <p>Ahora Ikal no puede buscar respaldo en el Ministerio P&uacute;blico, ni con los Federales, ni con la PGR. Repudia a las autoridades, todas son una mierda de corrupci&oacute;n. &laquo;A la chingada con la nota, primero lo primero&raquo;, se dijo. Guard&oacute; la lista y el contrato, se lanz&oacute; al abismo y tuvo la certeza que se encontrar&iacute;a de nuevo con Terreros y con el director de Salud P&uacute;blica, que acababa de autorizar un enlace entre Dreamhost y los Centros de Integraci&oacute;n Juvenil.</p>

            <p>Aqu&iacute; est&aacute;, esper&aacute;ndolos.</p>

            <p>La puerta principal se abre y entra un grupo de personas. &laquo;Son ellos&raquo;. El director de Salud abraza a una chica joven, rubia y delgada, vestida de traje sastre negro; a un lado, Sebasti&aacute;n Terreros Maldonado mira &aacute;vidamente sobre su hombro, como cercior&aacute;ndose de que algo no est&eacute;, de que algo no repte por su espalda. &laquo;Ya era hora&raquo;. Se pone de pie, tambalea, toma un envase de botella y se acerca a los reci&eacute;n llegados.</p>

            <p>&mdash;Doctor Terreros, director, qu&eacute; casualidad encontrarlos.</p>

            <p>El director, quien trae la mano debajo del pantal&oacute;n de la chica, sonr&iacute;e, intenta reconocerlo y hace un adem&aacute;n para saludar. Ikal empu&ntilde;a el envase. Toma fuerza y lo estrella en el rostro del funcionario.</p>

            <p>Gritos, dudas, incertidumbre.</p>

            <p>La rubia cae junto con el agredido; Terreros se repliega hacia el interior y lanza un par de blasfemias, no sabe qu&eacute; est&aacute; sucediendo. Algunos meseros se acercan para calmar la escena, pero de inmediato Diego saca su Ruger femenino y dispara dos veces hacia el techo.</p>

            <p>M&aacute;s gritos, muchos se esconden bajo las mesas, otros piensan que es un asalto y levantan las manos.</p>

            <p>&mdash;Atr&aacute;s, cabrones, que esto es entre estos pendejos y yo, atr&aacute;s &mdash;dice y dispara de nuevo.</p>

            <p>Apunta hacia el piso, donde el director de Salud intenta ponerse en pie, apoy&aacute;ndose en la chica rubia que llora copiosamente.</p>

            <p>&mdash;&iexcl;Ahora s&iacute;, para que sigas aprobando pendejadas!</p>

            <p>Acciona el gatillo.</p>

            <p>El eco del impacto se embarra en las paredes. El director gime, destila sangre desde el hombro.</p>

            <p>&mdash;C&aacute;llate, cabr&oacute;n.</p>

            <p>Dispara de nuevo, ahora en una de las piernas. Los comensales huyen. Los sollozos de la chica resbalan por la piel. &laquo;&iquest;Cu&aacute;ntos tiros llevo?&raquo;.</p>

            <p>Entonces una botella se estrella en su espalda, la fuerza del golpe lo hace girar por inercia y dispara de inmediato a un mesero. No da en el blanco: logr&oacute; parapetarse detr&aacute;s de una mesa.</p>

            <p>Terreros aprovecha la confusi&oacute;n y salta sobre Ikal. Logra derribarlo y, en el forcejeo, el atacante pierde el arma. Se pone en pie y arremete contra el doctor, golpea con sa&ntilde;a, con una rabia que cre&iacute;a apagada, con el coraje de las peleas de su adolescencia. No da tregua. Impacto tras impacto. Busca el arma, la toma, apunta a su est&oacute;mago. &laquo;Por Mar&iacute;a Jos&eacute; y mi hijo, cabr&oacute;n de mierda&raquo;, piensa y, antes de accionar el gatillo, otra botella se estrella en su hombro. Dispara. Falla. Apenas impacta en una de las piernas del doctor. Un segundo destello atraviesa el est&oacute;mago del mesero que lanz&oacute; las botellas. Terreros se aleja reptando.</p>

            <p>Alguien que se encuentra al lado del mesero herido grita y maldice. Vocifera que llamen a una ambulancia, que si hay un m&eacute;dico en el lugar, que alguien los ayude. Pronto dos, tres, cuatro compa&ntilde;eros se le unen e intentan detener la hemorragia del est&oacute;mago.</p>

            <p>A su lado, el director de Salud se desangra. La chica rubia intenta cerrar la herida sin resultados, el l&iacute;quido fluye por el piso. Apunta al funcionario, jala el gatillo. Nada. &laquo;Se me acabaron los pinches tiros y no compr&eacute; m&aacute;s&raquo;, piensa y guarda el arma. Patea el rostro ya astillado por los vidrios.</p>

            <p>Busca al doctor Terreros. &laquo;&iquest;D&oacute;nde est&aacute;s, cabr&oacute;n?&raquo;. Los segundos son una eternidad. Lo encuentra. &laquo;&iquest;Conque escondi&eacute;ndote, hijo de la chingada?&raquo;, se acerca a la mesa, toma una botella Buchanan&rsquo;s y la lanza. Da en su pierna. Sale de su escondite y se miden. Intenta repetirlo, pero se detiene. Un compa&ntilde;ero del mesero herido le cierra el paso, lleva una picahielo como arma. La mirada entre Terreros e Ikal, a s&oacute;lo cuatro metros de distancia, es una trinchera en suspenso.</p>',
            'review'    => '<p>Est&aacute; muerta. La idea se encaja en su memoria. Est&aacute; muerta. Es la imagen recurrente que infecta los recuerdos.</p>',
            'visibility' => 'public',
            'image'     => 'http://proyecto.test/images/txThGnyon0utvNM1Qd5xNquR1HCM5RsC3sbUT7es.jpeg',
            'user_id'   => '1',
            'gender_id' => '10'
        ]);

        $posts = Post::create([
            'title'     => 'Minima',
            'written'   => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
            'review'    => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>',
            'visibility' => 'public',
            'image'     => null,
            'user_id'   => '2',
            'gender_id' => '12'
        ]);

        $posts = Post::create([
            'title'     => 'Perspiciatis',
            'written'   => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'review'    => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;</p>',
            'visibility' => 'public',
            'image'     => 'http://proyecto.test/images/leF1CQcJbcvg0NBZKF2VFXeIPty19nAKz5zAZVn0.jpeg',
            'user_id'   => '5',
            'gender_id' => '15'
        ]);

        $posts = Post::create([
            'title'     => 'Magni dolores',
            'written'   => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
            'review'    => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>',
            'visibility' => 'public',
            'image'     => 'http://proyecto.test/images/Qz1g7Chies3ITkrIENq8RDGehXOSNrN5COFcSzQD.jpeg',
            'user_id'   => '5',
            'gender_id' => '14'
        ]);

        $posts = Post::create([
            'title'     => 'Adipisci velit',
            'written'   => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
            'review'    => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>',
            'visibility' => 'public',
            'image'     => 'http://proyecto.test/images/dWiw6YKLGhqX9chGpHEqnjHuJH3vAvFQnSL4ampY.jpeg',
            'user_id'   => '4',
            'gender_id' => '14'
        ]);

        //comment

        $comment = Comment::create([
            'comment'   => '¡Hola mundo!',
            'post_id'   => '1',
            'user_id'   => '2'
        ]);

        $comment = Comment::create([
            'comment'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'post_id'   => '1',
            'user_id'   => '3'
        ]);

        $comment = Comment::create([
            'comment'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
            'post_id'   => '2',
            'user_id'   => '2'
        ]);

        $comment = Comment::create([
            'comment'   => '¡Muy interesante bro! ¡Saludos!',
            'post_id'   => '7',
            'user_id'   => '4'
        ]);

        $comment = Comment::create([
            'comment'   => '¡Muy interesante!',
            'post_id'   => '3',
            'user_id'   => '5'
        ]);

        $comment = Comment::create([
            'comment'   => 'Hola',
            'post_id'   => '4',
            'user_id'   => '4'
        ]);
    }
}
