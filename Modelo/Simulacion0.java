package Modelo;
import java.sql.SQLException;
import java.text.DecimalFormat;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.Scanner;

import DAORelacional.DAOSimulacion;

public class Simulacion {

	private Integer id=0;					// PK en base de datos
	private LocalDateTime timestamp;		// Fecha de la simulaci�n
	private SimEngine se;					// Motor de simulaci�n que se utiliza
	private Lander lander;					// M�dulo que se utiliza
	private Player user;					// Jugador que la efect�a
	private Escenario planet;				//	Escenario de la simulaci�n
	private ArrayList<DatosSim> simData = new ArrayList<DatosSim>();	// Datos de la simulaci�n
	private static boolean outOfFuel = false;
	public boolean __break = false;			// Flag para terminar la simulaci�n ( el usuario abandona)
	// Para abandonar hay que introducir un nivel de impulso = -1
	
	// Constructor
	public Simulacion(Player _user, Lander lander, Escenario planet) {
		super();
		this.lander = lander;
		this.user = _user;
		this.planet = planet;
		this.timestamp = LocalDateTime.now();
		init();
	}
	// Getter y Setter
	public LocalDateTime getTimestamp() 				{		return timestamp;	}
	public void setTimestamp(LocalDateTime timestamp) 	{		this.timestamp = timestamp;	}
	public SimEngine getSe() 							{		return se;	}
	public void setSe(SimEngine se) 					{		this.se = se;	}
	public Lander getLander() 							{		return lander;	}
	public void setLander(Lander lander) 				{		this.lander = lander;	}
	public Player getUser() 							{		return user;	}
	public void setUser(Player user) 					{		this.user = user;	}
	public Escenario getPlanet() 						{		return planet;	}
	public void setPlanet(Escenario planet) 			{		this.planet = planet;	}
	public ArrayList<DatosSim> getSimData()	 			{		return simData;	}
	public void setSimData(ArrayList<DatosSim> simData) {		this.simData = simData;	}
	public Integer getId() 								{		return id;	}
	public void setId(Integer id) 						{		this.id = id;	}
	
	// M�todos
	
	// A�ade un instante de simulaci�n a la simulaci�n
	// Los datos vendr�n de SimEngine, sin el dato de fuel en dep�sito.
	public void addSimData() {
		DatosSim ds = se.getSimData();
		ds.setFuel(getLander().getFuel_deposito());
		simData.add(ds);
	}
	
	/**
	 * Inicializa la simulaci�n
	 * @return
	 */
	public void init() {
		// Valores iniciales
		this.se = new SimEngine(planet.getHe(),planet.getVe(),planet.getG());
	}
	
	/**
	 * Muestra panel de indicadores
	 */
	public void muestraPanel() {
		Double vel = se.getVel();
		Double dist =se.getDist();
		Integer tiempo = se.getTiempo();
		Double fuel_deposito = lander.getFuel_deposito();
		DecimalFormat df = new DecimalFormat("+0000.00;-0000.00");
		
		if (tiempo == 0) { // inicio de la simulaci�n 
	        System.out.println("TIEMPO  DISTANCIA   VEL        FUEL      NIVEL IMPULSO"); // Tablero de indicadores
	        System.out.println("------------------------------------------------------");
		}
		 // Muestra valores de los par�metros de la simulaci�n, formateados en columnas
         System.out.printf("%03d    %s    %s    %04d        ",
        		           tiempo,df.format(dist),df.format(vel),fuel_deposito.intValue()
        		          );
	}
	
	public void aplicaMotor(Lander l) {
		
		Double impulso=0.0;
		Integer nivel_impulso = 0;
		
		// S�lo si tenemos fuel para quemar
		if (!outOfFuel) {
			Scanner sc = new Scanner(System.in);
	        System.out.print("�(0-9)? >");                      	// Solicita nivel de impulso       
			nivel_impulso = sc.nextInt();                       	// Lectura de teclado
			if (nivel_impulso ==-1) {
				nivel_impulso =0;
				__break = true;										// Abandonar la simulaci�n
			}
			if (nivel_impulso <0) nivel_impulso =0;					// Sencilla comprobaci�n de l�mites
			if (nivel_impulso >9) nivel_impulso =9;
			
		}
		else {
			System.out.println("SIN FUEL , CAIDA LIBRE!");
			try {
				Thread.sleep(1000);
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
		}
		
		if (lander.getFuel_deposito() == 0) nivel_impulso =0;   // Si no queda fuel , no tiene efecto la elecci�n
		impulso = lander.getPerfPot(nivel_impulso);        		// Elijo, en funci�n del nivel el impulso instant�neo
		se.setImpulso(impulso);									// Pasar el impulso al motor de simulaci�n.
		// Consumo de combustible
        lander.setFuel_a_quemar( impulso * 2);      			// No es una simulaci�n realista
        lander.setFuel_deposito(lander.getFuel_deposito() - lander.getFuel_a_quemar());      // Actualizo la reserva de fuel
		if (lander.getFuel_deposito()<0) 	{					// Eliminar incosistencias en el c�lculo
				lander.setFuel_deposito(0);  
				outOfFuel = true;
		} // Sin fuel
	}
	
	public Boolean show_result() {
		
		Boolean flag = false;				// Terminaci�n sin salvar puntuaci�n
        // Comprobar la condiciones de aterrizaje y mostrar informaci�n sobre el mismo.
		Double vel_fin = se.getVel();
		Double dist_fin =se.getDist();
		Integer tiempo = se.getTiempo();
		Double fuel_deposito = lander.getFuel_deposito();
		DecimalFormat df = new DecimalFormat("+0000.00;-0000.00");
		
		if (!this.__break) {
		
			flag = (Math.abs(se.getVel())>lander.getRes_tren());
			if (flag){
                System.out.println("\nHAS ESTRELLADO LA NAVE");
                System.out.println("------------------------------------------------");
                System.out.println("VELOCIDAD DE ENTRADA    : "+ df.format(vel_fin) + " m/s");
                System.out.println("HAS HECHO UN CRATER DE  : "+ df.format(Math.abs(dist_fin)) + " m");
                System.out.println("------------------------------------------------");
                flag = false;	// no salvar
			}
			else {
                System.out.println("\nATERRIZAJE EXITOSO!!");
                System.out.println("------------------------------------------------");
                System.out.println("TIEMPO DE ATERRIZAJE : " + tiempo + " s");
                System.out.println("FUEL EN DEPOSITO     : " + fuel_deposito + " l");
                System.out.println("------------------------------------------------");
                flag=true;		// salvar
			}
		}
		else {
		    System.out.println("\nSIMULACI�N INTERRUMPIDA POR EL USARIO");
            System.out.println("------------------------------------------------");
            System.out.println("TIEMPO DE SIMULACI�N : " + tiempo + " s");
            System.out.println("FUEL EN DEPOSITO     : " + fuel_deposito + " l");
            System.out.println("DISTANCIA A OBJETIVO : " + dist_fin + " m");
            System.out.println("------------------------------------------------");	
            flag = false;	// no salvar
		} // Misi�n finalizada o interrumpida
	 return flag;	
	}  // show_result
	
	/**
	 * Salva los datos de simulaci�n en base de datos
	 * @return
	 */
	public boolean saveSim(String Modo) {
		DAOSimulacion ds = new DAOSimulacion(Modo);
		try {
			if (ds.saveSimulacion(this))
				System.out.println("Datos Almacenados en base de datos.");
			ds._c.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return true;
	}
	
	/**
	 * Registra el marcador obtenido en la base de datos
	 * Es llamado de forma interna por saveSim()
	 * @return
	 */
	private boolean saveScore() {
		return true;
	}
	
	public void show() {
		
		// Salida por pantalla;
	}
}
