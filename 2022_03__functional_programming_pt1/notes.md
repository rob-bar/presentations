# Functional programming

## Health check!

- Wie van jullie past functioneel programmeren dagelijks toe?
- Wie van jullie kent de term wel maar wil toch heel graag weten wat de diepere topics betekenen?
- Wie van jullie wil code schrijven waarbij de toekomstige lezer deze makkelijker kan begrijpen?

## Personal journey

Ik hoorde ongeveer een 4-5 jaar geleden iemand spreken van de term "Functioneel programeren".
Ik had al gehoord van Object oriented in het school en wist wel al goed hoe dat werkte maar
omdat die persoon heel goed was in Javascript wou ik er toch wel meer over weten,
Ik leerde meer over basisconcepten zoals pure funcions en first class functions en dacht, ik kan functioneel programmeren.
Man was ik verkeerd toen. Dit was ongeveer de periode dat underscore js en koffiescript heel populair waren.

Er gingen een aantal jaren voorbij en Typescript werd populair en ik kwam terug in aanraking met functioneel programeren,
maar dit keer op een heel ander niveau en er was een hele gap tussen mijn kennis en de kennis van mijn team gennoten.
Ik moest dingen bergijpen zoals Options, Either, Monads, Tuples. etc. etc.

Ik begreep ze niet, iemand communiceerde met mij en ik begreep niet wat die persoon mij wou vertellen.
Die concepten zijn belangrijk in functioneel programmeren en worden heel vaak gebruikt om te communiceren.

We zullen vandaag beginen bij het begin van functioneel programmeren.
Maar in 30min kan ik niet heel het concept functioneel programmeren uitleggen. Dus er zullen meerdere sessies volgen in de syncs.

Mijn agenda zit behoorlijk vol maar ik zal de serie proberen geven zonder al teveel weken tussen.

## intro & agenda

- Functions
- Closure
- Composition
- Immutability
- Recursion
- Lists & Data Structures
- Async
- Where to go after this?

## What is functional programming?

- Functioneel programmeren is gebasseerd op een andere manier van denken (Problemen worden anders aangepakt)
- Is het gerelateed aan wiskundige functies?
- Functioneel programmeren is niet: het function keyword gebruiken :D lol

## Wiki

In computer science, functional programming is a programming paradigm where programs are constructed by applying and composing functions. It is a declarative programming paradigm in which function definitions are trees of expressions that map values to other values, rather than a sequence of imperative statements which update the running state of the program.

## Why functional programming?

### Imperative vs Declarative

- Dit is 1 van de belangrijkste redenen waarom je zou Functioneel Programeren
- Functioneel programmeren is meer declaretief ivgl met imperatief

Maar wat is het verschil nu echt tussen de twee:

### Imperative

Imperative betekend dat de code vooral gefocussed is op de "Hoe lossen we dit probleem op?"
De toekomstige lezer van de code moet Alle gerelateerde code lezen en ergens uitvoeren mentaal vooraleer ze het doel van de code kunnen begrijpen.
Ze moeten als het ware afleiden van de code wat de code eigenlijk doet.

Je zou zeggenn "Op zich niet echt een relevant probleem". :D Wij zijn programmeurs dat is wat we doen.
Wel eigenlijk is het wel een relevant probleem, want...

Het dwingt de lezer om iets te doen waar hij eigenlijk geen natuurlijke gave voor heeft.
Wie kan de code perfect uitvoeren? De computer
Wie is er niet zo goed in het uitvoeren van code? Onze hersenen

Dus elke keer dat jij code schrijft dat de lezer dwingt om het uit te voeren in zijn hoofd enkel en alleen om ze te begrijpen,
is code dat moeilijker te begrijpen zal zijn en dus ook code dat moeilijker te onderhouden of te verbeteren is.

### Declarative

Wat is declaratief dan? Decalratief staat recht tegenover Imperatief en
zegt neenee het belangrijke deel is de "Wat is de uitkomst" en nog belangrijker de "Waarom doen we dit?".

Functioneel programmeren is op zichzelf meer declaratief georienteerd.
Maar op zich is ook alles relatief te bekijken.

Niets is echt absoluut hier en zegt ok functioneel programmeren is declaratief en al de rest is imperatief, zo werkt het niet.
Het is gebasseerd op de perceptie van de lezer of de schrijver.

Hoe meer we de lezer van onze code zijn focus kunnen verschuiven: weg van imperatieve,
naar het declaratieve, hoe makkelijker het zal zijn voor hem om de code te begrijpen.
En dat geld niet enkel wanneer iemand onze code leest. Dit geld ook voor onszelf in de toekomst.

### Provable

Nog een interessante reden waarom functioneel programmeren die meer uit de hoek van de mathematici komt is het feit dat het bewijsbaar is.
Functioneel programmeren ook al lijkt op een reeks functies die elkaar aanroepen, is het eigenlijk pure wiskunde.

Ik ben vrij zeker dat er nu wel ergens een belletje gaat rinkelen of dat er nu wel iemand is die terugdenkt aan de lessen wiskunde van in het middelbaar.
Waar we vergelijkingen moesten mathematisch bewijzen. En waar er een manier werd gezocht om effectief aan te tonen waarom 1 + 1 = 2 in de wiskunde.
Geloof het of niet maar die vergelijking is eigenlijk moeilijker te bewijzen dan je denkt.

Maar dat is niet het doel hier. Wij weten dat iemand ooit (1 of andere wiskundige) dat bewijs voor ons heeft afgeleverd en daarom is dat waar.
Het kan niet in twijfel worden getrokken.

Dus uiteindelijk als ik u vertel dat functioneel programmeren gebaseerd is op pure wiskunde (1+1) dan is dat het einde van het verhaal.
De wiskunde is bewezen en is correct.

Functioneel programmeren belooft ons wanneer we bepaalde programeer principes toepassen dat het gebaseerd is op echte wiskundige berekeningen.
En ook al begrijp ik de wiskunde niet, kan ik ervan uitgaan dat het bewezen is door iemand die slimmer is dan ik.

En dat is uiteindelijk het soort code dat je wil in je programma. Als ik die code gebruike dan weet ik wat ik kan verwachten
en dan weet ik dat ze elke keer werkt. 1 + 1 = 2

Nu kan ik mezelf focussen op belangrijkere code in mijn applicatie, business logica en domein locgica.
Dit is de code waar ik mijn tijd aan wil spenderen.

### LESS TO READ

Wat is de beste code? De beste code is code die niet bestaad :D of die niet moet gelezen worden.
Beetje een vreemde uitspraak maar laat het mij even uitleggen.

Stel er is een codebase die 10.000 lijnen groot is.
Wat als er van die code 9.900 regels gebaseerd zijn op mathematische principes waar ik niet moet aan twjifelen
en maar 100 regels business logic code waar ik mijn hele dag aan toewijd.

Zou deze codebase makkelijker onderhoudbaar zijn? Zou ik sneller stukken vinden en zou ik makkelijker bugs oplossen?
Als ik de oppervlakte verklein van hetgeen waar ik me op zou moeten focussen?
