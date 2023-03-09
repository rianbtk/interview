import 'dart:convert';

UpdateUserModel updateUserModelFromMap(String str) =>
    UpdateUserModel.fromMap(json.decode(str));

String updateUserModelToMap(UpdateUserModel data) => json.encode(data.toMap());

class UpdateUserModel {
  UpdateUserModel({
    required this.name,
    required this.job,
    required this.updatedAt,
  });

  var name;
  var job;
  var updatedAt;

  factory UpdateUserModel.fromMap(Map<String, dynamic> json) => UpdateUserModel(
        name: json["name"] == null ? null : json["name"],
        job: json["job"] == null ? null : json["job"],
        updatedAt: json["updatedAt"] == null
            ? null
            : DateTime.parse(json["updatedAt"]),
      );

  Map<String, dynamic> toMap() => {
        "name": name == null ? null : name,
        "job": job == null ? null : job,
        "updatedAt": updatedAt == null ? null : updatedAt.toIso8601String(),
      };
}
