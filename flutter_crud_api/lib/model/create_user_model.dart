import 'dart:convert';

CreateUserModel createUserModelFromMap(String str) =>
    CreateUserModel.fromMap(json.decode(str));

String createUserModelToMap(CreateUserModel data) => json.encode(data.toMap());

class CreateUserModel {
  CreateUserModel({
    required this.name,
    required this.job,
    required this.id,
    required this.createdAt,
  });

  var name;
  var job;
  var id;
  var createdAt;

  factory CreateUserModel.fromMap(Map<String, dynamic> json) => CreateUserModel(
        name: json["name"] == null ? null : json["name"],
        job: json["job"] == null ? null : json["job"],
        id: json["id"] == null ? null : json["id"],
        createdAt: json["createdAt"] == null
            ? null
            : DateTime.parse(json["createdAt"]),
      );

  Map<String, dynamic> toMap() => {
        "name": name == null ? null : name,
        "job": job == null ? null : job,
        "id": id == null ? null : id,
        "createdAt": createdAt == null ? null : createdAt.toIso8601String(),
      };
}
