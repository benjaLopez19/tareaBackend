import { Component, OnInit } from '@angular/core';
import {AbstractControl,FormBuilder,FormGroup,Validators} from "@angular/forms"
import { Nota } from '../nota';
import {ServicioNotaService} from "../servicio-nota.service";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  screen = 0;
  titulo:AbstractControl;
  estado:AbstractControl;
  descripcion:AbstractControl;
  //ABIERTO==1, PROCESO==2, CERRADO==3

  aux:Array<Nota>=[];
  aux2:Array<Nota>=[];
  nota:Nota | undefined;

  aIniciado:Array<Nota>=[];
  aProceso:Array<Nota>=[];
  aTerminado:Array<Nota>=[];

  form:FormGroup;
  constructor(public fb: FormBuilder, private servicio:ServicioNotaService) {
    this.form= this.fb.group({
      titulo:["",[Validators.required]],
      estado:["",[Validators.required]],
      descripcion:["",[Validators.required]]
    });

    this.titulo = this.form.controls["titulo"];
    this.estado = this.form.controls["estado"];
    this.descripcion = this.form.controls["descripcion"];
   }

  

  ngOnInit(): void {
    this.servicio.consultarNotas().subscribe(datos=>{
      this.aIniciado=datos[0];
      this.aProceso=datos[1];
      this.aTerminado=datos[2];

      console.log(this.aIniciado);
      console.log(this.aProceso);
      console.log(this.aTerminado);

      console.log(this.aIniciado[0]["titulo"]);
    });
  }

  consultarNotas(){
    this.servicio.consultarNotas().subscribe(datos=>{
      this.aIniciado=datos[0];
      this.aProceso=datos[1];
      this.aTerminado=datos[2];

      console.log(this.aIniciado);
      console.log(this.aProceso);
      console.log(this.aTerminado);

      console.log(this.aIniciado[0]["titulo"]);
    });
  }

  crear(){
    let lista:Array<Nota>=[{
      titulo:this.form.get("titulo")?.value,
      estado:this.form.get("estado")?.value,
      descripcion:this.form.get("descripcion")?.value
      }
    ];
    console.log(this.form.get("titulo")?.value);
    
    console.log(lista);
    this.servicio.guardarDatos(lista).subscribe(datos=>{
      
    });
    this.consultarNotas();
    this.limpiar();
    this.screen=1;
  }

  editar(item:Nota){
    this.screen=2;
    console.log(item);
    this.nota=item;

    console.log("AQUI ESTA NOTA\n");
    console.log(this.nota);
  }//editar asigna
  
  adicionar(){
    this.screen=0;
  }

  actualizar(){
    let lista:Array<Nota>=[{
      titulo:this.form.get("titulo")?.value,
      estado:this.form.get("estado")?.value,
      descripcion:this.form.get("descripcion")?.value
      }
    ];
    lista[1]=<Nota>this.nota;
    console.log("AQUI VA LISTA DE ACTUALIZAR\n");
    console.log(lista);
    //item nuevo lista[0], item viejo lista[1]
    //this.servicio.guardarDatos(lista).subscribe(datos=>{
      
    //});
    
  }

  limpiar(){
    this.titulo.setValue("");
    this.descripcion.setValue("");
    this.estado.setValue("Selected");
    this.screen=0;
    console.log("toy siendo apretado");
  }

  eliminar(){

  }
}
