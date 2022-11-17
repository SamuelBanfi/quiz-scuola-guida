## Indice

1. [Introduzione](#introduzione)

    - [Informazioni sul progetto](#informazioni-sul-progetto)

    - [Scopo](#scopo)

2. [Analisi](#analisi)

    - [Analisi e specifica dei requisiti](#analisi-e-specifica-dei-requisiti)

4. [Implementazione](#implementazione)

5. [Test](#test)

    - [Protocollo di test](#protocollo-di-test)

    - [Risultati test](#risultati-test)

    - [Mancanze/limitazioni conosciute](#mancanze/limitazioni-conosciute)

7. [Conclusioni](#conclusioni)

    - [Sviluppi futuri](#sviluppi-futuri)

    - [Considerazioni personali](#considerazioni-personali)

8. [Sitografia](#sitografia)

## Introduzione

### Informazioni sul progetto

 - **Titolo**: Questionario patenti 

 - **Allievi coinvolti nel progetto**:
  
   - Samuel Banfi, <a href="mailto:samuel.banfi@samtrevano.ch">samuelbanfi@samtrevano.ch</a>
  
   - Dennis Donofrio, <a href="mailto:dennis.donofrio@samtrevano.ch">dennis.donofrio@samtrevano.ch</a>

 - **Classe**: I4AC, Scuola Arti e Mestieri Trevano, sezione Informatica

 - **Committente**: Massimo Sartori

 - **Data d'inizio**: 05.10.2022

 - **Data di fine**: 21.12.2022

### Scopo

Lo scopo del progetto "Questionario patenti" è quello di permettere agli utenti prossimi all'esame teorico per la patente di esercitarsi con le domande. Offre la possibilità di rispondere alla domande. In caso di risposta errata c'è la possibilità di apprendere dal proprio errore grazie alla visualizzazione di un video e alla lettura di un documento esplicativo.

## Analisi

### Analisi e specifica dei requisiti

 | ID | REQ-001 |
 | -------- | - |
 | **Nome** | Login degli utenti |
 | **Priorità** | 1 |
 | **Versione** | 1.1 |
 | **Note** | Deve esserci la maschera di login contenente la mail e la password. |

 | ID | REQ-002 |
 | -------- | - |
 | **Nome** | Gestione degli utenti |
 | **Priorità** | 1 |
 | **Versione** | 1.0 |
 | **Note** | L'amministratore può creare, modificare ed eliminare sia utenti che amministratori. Inoltre bisognerà impostare il limite di tempo per il quale è attivo l'account. |

 | ID | REQ-003 |
 | -------- | - |
 | **Nome** | Logout degli utenti |
 | **Priorità** | 1 |
 | **Versione** | 1.0 |
 | **Note** | Deve esserci la possibilità di fare logout da tutte le pagine. |

 | ID | REQ-004 |
 | -------- | - |
 | **Nome** | Gestione dei settaggi per i formulari |
 | **Priorità** | 1 |
 | **Versione** | 1.0 |
 | **Note** | Dovrà esserci una pagina dedicata ai settaggi dei formulari dove è possibile impostare la durata massima. Inoltre è possibile impostare il numero massimo di errori. Questa pagina è accessibile esclusivamente agli amministratori. |

 | ID | REQ-005 |
 | -------- | - |
 | **Nome** | Gestione supporti multimediali |
 | **Priorità** | 1 |
 | **Versione** | 1.0 |
 | **Note** | Dovrà esserci una pagina dedicata alla gestione dei contenuti multimediali come video e documenti per ogni singola domanda. |

 | ID | REQ-006 |
 | -------- | - |
 | **Nome** | Avvio di un questionario casuale |
 | **Priorità** | 1 |
 | **Versione** | 1.0 |
 | **Note** | L'utente dovrà poter avviare un questionario contenente 50 domande casuali. Le domande saranno composte da una foto, un testo e 3 risposte possibili. Solo una risposta è corretta. C'è la possibilità di visionare un video e un documento esplicativo. |

**Spiegazione elementi tabella dei requisiti:**

**ID**: identificativo univoco del requisito

**Nome**: breve descrizione del requisito

**Priorità**: indica l’importanza di un requisito nell’insieme del
progetto, definita assieme al committente.

**Versione**: indica la versione del requisito. Ogni modifica del
requisito avrà una versione aggiornata.

Sulla documentazione apparirà solamente l’ultima versione, mentre le
vecchie dovranno essere inserite nei diari.

**Note**: eventuali osservazioni importanti o riferimenti ad altri
requisiti.

## Implementazione

## Test

### Protocollo di test

 | Test Case       | TC-001                               |
 | --------------- |--------------------------------------|
 | **Nome**        |  |
 | **Riferimento** |  |
 | **Descrizione** |  |
 | **Prerequisiti** | - |
 | **Procedura** |  |
 | **Risultati attesi** |  |

### Risultati test

 | Test Case | TC-013 |
 | --------- | ------ |
 | Funzionamento |  |
 | Commento |  |
 | Data |  |

### Mancanze/limitazioni conosciute

## Conclusioni

### Sviluppi futuri

### Considerazioni personali

## Sitografia

 - https://www.php.net/manual/en/function.password-hash.php<br>Data ultima visita: 23.12.2021